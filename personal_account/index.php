<?php
session_start();
include_once '../connect_db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Личный кабинет</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header id="header">
<div class="header_wrapper">
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
<div class="cart_count">
<?php
if (isset($_SESSION['cart_list'])) {
	echo "" . count($_SESSION['cart_list']) . "";

}
else
{
	echo "0";
}

?>
	
</div>	
			<a href="../shopping_cart/index.php"><div class="shopping_cart"></div></a>
			<a href="../favorites/index.php"><div class="favorites fav"></div></a>
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

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
			<li><a href="../menu/about_us/index.php" class="menu__item">О НАС</a></li>
			<div class="drpdwn_catalog">
						<li><a href="#" class="menu__item">КАТАЛОГ</a></li>
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
			<li><a href="../menu/stocks/index.php" class="menu__item">АКЦИИ</a></li>
			<li><a href="brands/index.php" class="menu__item">БРЕНДЫ</a></li>
						<li><a href="../menu/delivery/index.php" class="menu__item">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../menu/contacts/index.php" class="menu__item">КОНТАКТЫ</a></li>
						<li><a href="../menu/bonus/" class="menu__item">БОНУСНАЯ ПРОГРАММА</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../menu/about_us/">О НАС</a></li>

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
			</div>
</div>

		</header>

<!-- конец шапки !-->

<!-- начало контента !-->

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Личный кабинет</li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>ЛИЧНЫЙ КАБИНЕТ</h1>
		
	</div>	


<div class="personal_account_wrapper">
	<ul>
		<li class="active">Мои заказы</li>
		<li><a href="personal_account_settings/index.php">Настройки</a></li>
		<li><a href="personal_account_bonuses/index.php">Бонусы</a></li>
		<li><a href="../controllers/exit.php">Выйти</a></li>
	</ul>

	<div class="personal_account_data">
		<h1>ПОСЛЕДНИЕ ЗАКАЗЫ</h1>


		
			<div class="last_orders_wrapper">
			
				
				<?php 

				$str_select_orders="SELECT * FROM `orders` WHERE email='".$_SESSION['user']['login']."'";
				$run_select_orders=mysqli_query($connect,$str_select_orders);
				$count_order=mysqli_num_rows($run_select_orders);


				?>
				<div class="shopping_cart_wrapper">
					<?php if ($count_order>0): ?>

<?php while ($out_orders=mysqli_fetch_array($run_select_orders)): ?>
		
<div class="shopping_cart_filled">
	<div class="order_info">
		<div class="order_name" ><?php echo $out_orders[id]; ?></div>
		<div class="order_name" style="width: 400px"><?php echo $out_orders[goods]; ?></div>
		
		<div class="order_price"><b><?php echo $out_orders[price]; ?></b></div>
		<div class="order_name" >
		<?php
		switch ($out_orders[status]) {
	case '0':
		echo "Обрабатывается";
		break;
		
		case '1':
		echo "Доставляется";
		break;
		
		case '2':
		echo "Доставлен";
		break;
	

}
?></div>
		<a href="cancellations.php?id_order=<?php echo $out_orders[id]; ?>"><div class="order_name">Отменить</div></a>
	</div>
</div>
<br>
<br>

<?php endwhile; ?>

	<?php else : ?>

		<div class="last_orders">Вы пока ничего не заказали</div></div>

		

	<?php endif; ?>




		
		</div>
			
		</div>
<div class="personal_account_data">
		<h1>ИЗБРАННОЕ</h1>
		<div class="last_orders_wrapper">



<?php if ( isset($_SESSION['fav_list']) && count($_SESSION['fav_list']) !=0 ) : ?>
	
			
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

		<div class="last_orders">Вы пока не добавили ни одного товара в избранное</div>

	<?php endif; ?>




		
		</div>

	</div>

</div>




		</main>

<!-- конец контента !-->

<!-- начало футера !-->

		<footer>

			<div class="logo_wrapper">

				<a href="../index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

<div class="footer_filling">
			<ul>
				<li><a href="../menu/about_us/index.php">О НАС</a></li>
				<li><a href="../menu/stocks/index.php">АКЦИИ</a></li>
				<li><a href="../menu/delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="../menu/contacts/index.php">КОНТАКТЫ</a></li>
				<li><a href="../menu/bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
				<li><a href="/personal_account/index.php">АККАУНТ</a></li>
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
	