<?php 

session_start();

include_once ('../../connect_db.php');
error_reporting(0);

$id_goods=$_GET['id_goods'];

$str_out_goods="SELECT * FROM `goods` WHERE id='$id_goods'";
$run_out_goods=mysqli_query($connect, $str_out_goods);
$out_goods=mysqli_fetch_array($run_out_goods);




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo "$out_goods[product_name]"; ?> - интернет-магазин Ножницы</title>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header id="header">
<div class="header_wrapper">
			<div class="logo_wrapper">

				<a href="../../index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

			<div class="smth_near_logo">

				<div class="search_wrap">
					
				<form method="GET" action="../../search/index.php">
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
			<a href="../../shopping_cart/index.php"><div class="shopping_cart"></div></a>
			<a href="../../favorites/index.php"><div class="favorites fav"></div></a>
			<?php 

			if ($_SESSION['user']) {
				echo "<a href=../../personal_account/index.php><div class=user_account></div></a>";
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
			<li><a href="../../menu/about_us/index.php" class="menu__item">О НАС</a></li>
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
										<li><a href='../../category/?id_category=$out[category_id] '> $out[cat_name]</a></li>
											";
										}
									}

									?>


								</ul>
							</nav>
						</div>
						</div>
			<li><a href="../../menu/stocks/" class="menu__item">АКЦИИ</a></li>
			<li><a href="brands/" class="menu__item">БРЕНДЫ</a></li>
						<li><a href="../../menu/delivery/index.php" class="menu__item">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../../menu/contacts/index.php" class="menu__item">КОНТАКТЫ</a></li>
						<li><a href="../../menu/bonus/index.php" class="menu__item">БОНУСНАЯ ПРОГРАММА</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../../menu/about_us/index.php">О НАС</a></li>

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
										<li><a href='../../category/?id_category=$out[category_id] '> $out[cat_name]</a></li>
											";
										}
									}

									?>


								</ul>
							</nav>
						</div>
						</div>

						<li><a href="../../menu/stocks/index.php">АКЦИИ</a></li>
						<li><a href="../../brands/index.php">БРЕНДЫ</a></li>
						<li><a href="../../menu/delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../../menu/contacts/index.php">КОНТАКТЫ</a></li>
						<li><a href="../../menu/bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
					</ul>
				</nav>
			</div>
			</div>
</div>

		</header>

<!-- конец шапки !-->

<!-- начало контента !-->

<?php 

$str_out_category="SELECT * FROM `category` WHERE category_id=$out_goods[category]";
						$run_out_category=mysqli_query($connect, $str_out_category);

$out_category=mysqli_fetch_array($run_out_category);




$str_out_sections="SELECT * FROM `sections` WHERE section_id=$out_goods[section]";
						$run_out_sections=mysqli_query($connect, $str_out_sections);

$out_sections=mysqli_fetch_array($run_out_sections);


?>

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../../index.php">Главная</a></li>

			<li class="breadcrumb-item"><a href="<?php echo "<a href='../../../../category/?id_category=$out_category[category_id]"; ?>"><?php echo "$out_category[cat_name]"; ?></a></li>


			<li class="breadcrumb-item"><a href="<?php echo "../../category/sections/?id_section=$out_sections[section_id]"; ?>"><?php echo "$out_sections[section_name]"; ?></a></li>


			<li class="breadcrumb-item active_brdcrmb"><?php echo "$out_goods[product_name]"; ?></li>
		</ul>
		</div>
	
<div class="brands_page_wrapper">

<article class="layout_content">

<div class="product_image_wrap">
	<div class="product_image_on_page"></div>
	<?php 

echo "<img src='../../images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='product_image_on_page'";

	?>
</div>	

	<div class="product_info_on_page">
		<div class="product_title_on_page"><?php echo "$out_goods[product_name]"; ?></div>
		<h3>Есть в наличии</h3>
		<div class="product_title_on_page"><b><?php echo "$out_goods[price]"; ?> Р</b></div>

		<div class="action_with_product">
		<a href="../../shopping_cart/?id_product=<?php echo "$out_goods[id]"; ?>"><div class="product_action">ДОБАВИТЬ В КОРЗИНУ</div></a>
		<a href="../../favorites/?id_product_fav=<?php echo "$out_goods[id]"; ?>"><div class="product_action">В ИЗБРАННОЕ</div></a>
		</div>

	</div>



</article>


<div class="product_description_on_page">
	<div class="product_title_on_page desc">Описание</div>

	<div class="description"><?php echo "$out_goods[description]"; ?></div>



</div>

<div class="product_comments_on_page">
	<div class="product_title_on_page desc">Отзывы</div>
	<div class="comment_section">	
		<form method="POST" class="comment_form" id="comment">
		<div class="comment_area">

			<?php if ($_SESSION['user']): ?>
	
	<textarea form="comment" name="comment" placeholder="Место для комментария" class="comment_area_scnd"></textarea>
	<input type="submit" name="send_comment" class="post_a_review" value="ОПУБЛИКОВАТЬ ОТЗЫВ">
	
</form>
</div>

<?php 
$comment=$_POST['comment'];
$send_comment=$_POST['send_comment'];



if (!isset($send_comment) && !isset($comment)) {
	echo "<div class=thanks>Оставьте свой отзыв</div>";
}
else
{
	$str_add_comment="INSERT INTO `comments`(`id_user`, `id_product`, `comment`) VALUES ('".$_SESSION['user']['id']."','$out_goods[id]','$comment')";
	

	$run_add_comment = mysqli_query($connect,$str_add_comment);
	
	echo "<div class=thanks>Спасибо!</div>";


}

?>

</div>

<?php else: ?>

	<div class="comment_section">Войдите или зарегистрируйтесь, чтобы оставлять отзывы</div>

<?php endif; ?>

<div class="comments comment_from_user">
	<?php 

	$str_out_comment="SELECT * FROM comments WHERE id_product='$id_goods'";
	$run_out_comment=mysqli_query($connect, $str_out_comment);



	while ($out_comment=mysqli_fetch_array($run_out_comment)) {
	$str_select_user="SELECT * FROM users WHERE id=$out_comment[id_user]";
	$run_select_user=mysqli_query($connect, $str_select_user);
	while ($out_user=mysqli_fetch_array($run_select_user)) {
		echo "
<div class=comment_content_wrapper>
		<h4>$out_user[name]</h4>
	<div class=comment_content>$out_comment[comment]</div>
	<div>$out_comment[add_at]</div>
</div>
	";
}
	}

	?>
	
</div>

		</main>

<!-- конец контента !-->

<!-- начало футера !-->

		<footer>

			<div class="logo_wrapper">

				<a href="index.html"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

<div class="footer_filling">
			<ul>
				<li><a href="about_us.html">О НАС</a></li>
				<li><a href="stocks.html">АКЦИИ</a></li>
				<li><a href="delivery.html">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="contacts.html">КОНТАКТЫ</a></li>
				<li><a href="bonus.html">БОНУСНАЯ ПРОГРАММА</a></li>
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
			<form method="POST" action="../../controllers/auth.php">
				<input type="text" name="login_auth" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password_auth" placeholder="Пароль" class="reg_form_input">
				<input type="submit" name="auth" value="ВОЙТИ" class="reg_form_input auth">
			</form>

			
<?php echo $_SESSION['auth_error'];  ?>
			<div class="or_reg">Или <a href="#registration">зарегистрируйтесь</a></div>
		</div>
	</div>
</div>

<div class="popup" id="registration">
	<div class="popup_body">
		<div class="popup_content reg">
			<a href="#" class="popup_close">X</a>
			<h4>РЕГИСТРАЦИЯ</h4>
			<form method="POST" action="../../controllers/reg.php">
				<input type="text" name="name" placeholder="Имя" class="reg_form_input">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="password" name="r_password" placeholder="Подтверждение пароля" class="reg_form_input">
				<input type="submit" name="reg" value="ЗАРЕГЕСТРИРОВАТЬСЯ" class="reg_form_input auth">
			</form>
			<?php echo $_SESSION['reg_error'];  ?>
			<div class="or_reg">Уже есть аккаунт?<a href="#reg_form">Войдите</a></div>

		</div>
	</div>


</div>
	</body>
	</html>
	