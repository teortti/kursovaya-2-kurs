<?php 

session_start();
include_once('../../connect_db.php');




?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина - интернет-магазин Ножницы</title>
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

			if (isset($_SESSION['user'])) {
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
			<li><a href="../../menu/stocks/index.php" class="menu__item">АКЦИИ</a></li>
			<li><a href="../../brands/index.php" class="menu__item">БРЕНДЫ</a></li>
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

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Оформление заказа</li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>Оформление заказа</h1>
		
	</div>	



		

		
	
		<ul>
			

<div class="shopping_cart_wrapper" style="margin-bottom: 50px;
    display: table-caption;">

<form method="POST" class="form_order" action="../../controllers/success_order_or_not.php">
    <?php 

if (isset($_SESSION['user'])) : ?>
		

	
<input type="text" name="name" placeholder="Ваше имя" class="order_input" value="<?php echo $_SESSION['user']['name']; ?>">
<input type="text" name="surname" placeholder="Ваша фамилия" class="order_input" value="<?php echo $_SESSION['user']['surname']; ?>">
<input type="text" name="tel_number" placeholder="Номер телефона" class="order_input">
<input type="text" name="email" placeholder="Эл. почта" class="order_input" value="<?php echo $_SESSION['user']['login']; ?>">
<input type="text" name="city" placeholder="Город, страна" class="order_input">
<input type="text" name="adress" placeholder="Адрес доставки (улица, дом, квартира)" class="order_input">
	
<?php  else : ?>
		
		<input type="text" name="name" placeholder="Ваше имя" class="order_input">
<input type="text" name="surname" placeholder="Ваша фамилия" class="order_input">
<input type="text" name="tel_number" placeholder="Номер телефона" class="order_input">
<input type="text" name="email" placeholder="Эл. почта" class="order_input">
<input type="text" name="city" placeholder="Город, страна" class="order_input">
<input type="text" name="adress" placeholder="Адрес доставки (улица, дом, квартира)" class="order_input">
	
<?php endif; ?>
		
	</div>
</div>	





<div class="total_price" style="padding-top: 25px;">Итого:<input type="" name="count"
	value=" <?php echo $_SESSION['count']['count']; ?>" class="input_count" readonly> </div>
	
<input type="submit" name="order" value="Оформить" class="reg_form_input auth" style="font-size: 30px; width: 400px; height: 100px; margin-bottom: 70px;">
</div>
</form>


<?php

$order=$_POST['order'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$tel_number=$_POST['tel_number'];
$email=$_POST['email'];
$city=$_POST['city'];
$adress=$_POST['adress'];
$count=$_POST['count'];


$add_order="INSERT INTO `orders`(`name_user`, `surname_user`, `tel_number`, `email`, `city_country`, `adress`, `price`, `goods`) VALUES ('$name','$surname','$tel_number','$email','$city','$adress','$count', '".$_SESSION['count']['product_name']."')";


if ($order) {
	if ($name && $surname && $tel_number && $email && $city && $adress) {
		$run_add_order=mysqli_query($connect, $add_order);
		header("Location:../success_order/index.php");

	}
	else
	{
		echo "Что-то не заполнено";
	}
	
}






?>


</ul>

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
			<form>
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="submit" name="auth" value="ВОЙТИ" class="reg_form_input auth">
			</form>
			<div class="or_reg">Или <a href="#registration">зарегистрируйтесь</a></div>
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
	