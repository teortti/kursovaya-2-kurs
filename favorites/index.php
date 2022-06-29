<?php 

session_start();
include_once('../connect_db.php');
include_once('../controllers/favorites_function.php');



if ( isset($_GET['delete']) && isset($_SESSION['fav_list']) ) {
	foreach ($_SESSION['fav_list'] as $key => $value) {
		if ( $value['id'] == $_GET['delete'] ) {
			unset($_SESSION['fav_list'][$key]);
		}		
	}
}


if ( isset($_GET['id_product_fav']) && !empty($_GET['id_product_fav']) ) {

	$current_added_course = get_fav_by_id($_GET['id_product_fav']);

	// ...
	if ( !empty($current_added_course) ) {

		if ( !isset($_SESSION['fav_list'])) {
			$_SESSION['fav_list'][] = $current_added_course;
		}


		$course_check = false;

		if ( isset($_SESSION['fav_list']) ) {
			foreach ($_SESSION['fav_list'] as $value) {
				if ( $value['id'] == $current_added_course['id'] ) {
					$course_check = true;
				}
			}
		}


		if ( !$course_check ) {
			$_SESSION['fav_list'][] = $current_added_course;
		}

	} else {
		header("Location: 404.php");
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Избранное - интернет-магазин Ножницы</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header>

			<div class="logo_wrapper">

				<a href="../index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

			<div class="smth_near_logo">

				<div class="search_wrap">
				<form method="GET" action="../search/index.php">
			<input type="text" name="search" placeholder="Поиск по сайту" class="search">
			<input type="submit" name="start_search" class="button" value="">
				</form>
				</div>


			<div class="header_icons">
				<div style="      font-size: 20px;
    margin-right: 0px;
    margin-left: 0px;
    border: solid 1px;
    border-radius: 27px;
    width: 30px;
    height: 36px;
    
    padding-left: 15px;
    padding-top: 7px;
    background-color: #dfcfb3;
    border-color: transparent;">
<?php
if (isset($_SESSION['cart_list'])) {
	echo "" . count($_SESSION['cart_list']) . "";

}

?>
</div>

			<a href="../shopping_cart/index.php"><div class="shopping_cart"></div></a>

			<a href="../favorites/index.php"><div class="favorites"></div></a>
			<?php 

			if ($_SESSION['user']) {
				echo "<a href=../personal_account/index.php><div class=user_account></div></a>";
			}
			else
			{
				echo "<a href=#reg_form><div class=user_account></div></a>";
			}

			?>
				
			</div>

			</div>

			</div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../menu/about_us/index.php">О НАС</a></li>

						<div class="drpdwn_catalog">
						<li><a href="#">КАТАЛОГ</a></li>
						<div class="catalog_content">
							<nav>
								<ul>
									<?php 


									$str_out_category="SELECT * FROM `category`";

									$run_out_category=mysqli_query($connect, $str_out_category);

									if ($run_out_category) {
										while ($out=mysqli_fetch_array($run_out_category)) {
	
											echo "
										<li><a href='../category/?id_category=$out[category_id] '> $out[cat_name]</a></li>
											";
										}
									}

									?>

								</ul>
							</nav>
						</div>
						</div>

						<li><a href="../menu/stocks/index.php">АКЦИИ</a></li>
						<li><a href="../brands/index.php">БРЕНДЫ</a></li>
						<li><a href="../menu/delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../menu/contacts/index.php">КОНТАКТЫ</a></li>
						<li><a href="../menu/bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
						</ul>
				</nav>
			</div>


		</header>

<!-- конец шапки !-->

<!-- начало контента !-->

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Избранное</li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>ИЗБРАННОЕ</h1>
		
	</div>	




<?php if ( isset($_SESSION['fav_list']) && count($_SESSION['fav_list']) !=0 ) : ?>
	
		<ul>
			
<?php foreach( $_SESSION['fav_list'] as $fav ) : ?>
<div class="shopping_cart_wrapper">
		
<div class="shopping_cart_filled">
	<img src='../images/товары/<?php echo $fav['folder_name']; ?>/<?php echo $fav['product_pic']; ?>' style='margin-top: 70px;
width: 200px;
	height: 200px;
	background-repeat: no-repeat;
	background-size: 200px;
	margin-left: 30px;'>
	<div class="order_info">
		<div class="order_name" style="width: 400px"><a href="../category/products/?id_goods=<?php echo $fav['id'];?>"><?php echo $fav['product_name']; ?></a></div>
		
		
		
		
		<div class="order_price"><b><?php echo $fav['price']; ?> Р</b></div>
		<a href="../shopping_cart/?id_product=<?php echo $fav['id'];?>"><div class=shopping_cart buy_product></div></a>
		<a href="../favorites/?delete=<?php echo $fav['id'];?>"><div class="delete_order">X</div></a>
	</div>
</div>




				
			<?php endforeach; ?>
	


		
	
	<?php else : ?>

		<div class="your_cart_is_empty">Вы не добавили ни одного товара в избранное</div>

	<?php endif; ?>







</ul>




		</main>

<!-- конец контента !-->

<!-- начало футера !-->

		<footer>

			<div class="logo_wrapper">

				<a href="../"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

<div class="footer_filling">
			<ul>
				<li><a href="../menu/about_us/index.php">О НАС</a></li>
				<li><a href="../menu/stocks/index.php">АКЦИИ</a></li>
				<li><a href="../menu/delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="../menu/contacts/index.php">КОНТАКТЫ</a></li>
				<li><a href="../menu/bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
				<li><a href="">АККАУНТ</a></li>
			</ul>
<div class="subscribe_wrapper">
			<div class="subscribe_title">ПОДПИШИТЕСЬ, ЧТОБЫ БЫТЬ В КУРСЕ АКЦИЙ И НОВОСТЕЙ</div>

			<div class="subscribe_form">
			<input type="email" name="subscribe" class="your_mail" placeholder="Ваша почта">
			<button class="sbscrb_btn">ПОДПИСАТЬСЯ</button>
			</div>

</div>

</div>	

<div class="social_media">
	©2022 Магазин канцтоваров "Ножницы". Все права защищены
	<ul>
		<a href="#"><li class="vk"></li></a>
		<a href="#"><li class="fb"></li></a>
		<a href="#"><li class="twitter"></li></a>
		<a href="#"><li class="inst"></li></a>
	</ul>
</div>		
		</footer>

<!-- конец футера !-->

<div class="popup" id="reg_form">
	<div class="popup_body">
		<div class="popup_content">
			<a href="#" class="popup_close">X</a>
			<h4>АВТОРИЗАЦИЯ</h4>
			<form>
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="submit" name="auth" value="ВОЙТИ" class="reg_form_input auth">
			</form>
			<div class="or_reg">Или <a href="#registration">зарегестрируйтесь</a></div>
		</div>
	</div>
</div>

<div class="popup" id="registration">
	<div class="popup_body">
		<div class="popup_content reg">
			<a href="#" class="popup_close">X</a>
			<h4>РЕГИСТРАЦИЯ</h4>
			<form>
				<input type="text" name="name" placeholder="Имя" class="reg_form_input">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="password" name="password" placeholder="Подтверждение пароля" class="reg_form_input">
				<input type="submit" name="auth" value="ЗАРЕГЕСТРИРОВАТЬСЯ" class="reg_form_input auth">
			</form>
			<div class="or_reg">Уже есть аккаунт?<a href="#reg_form">Войдите</a></div>
		</div>
	</div>
</div>
	</body>
	</html>