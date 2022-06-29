<?php 
session_start();
include_once('../../connect_db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>О нас - интернет-магазин Ножницы</title>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header>

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
			<a href="../../favorites/index.php"><div class="favorites"></div></a>
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

			</div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../about_us/index.php">О НАС</a></li>

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

						<li><a href="../stocks/index.php">АКЦИИ</a></li>
						<li><a href="../../brands/index.php">БРЕНДЫ</a></li>
						<li><a href="../delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../contacts/index.php">КОНТАКТЫ</a></li>
						<li><a href="../bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
					</ul>
				</nav>
			</div>


		</header>

<!-- конец шапки !-->

<!-- начало контента !-->

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">О нас</li>
		</ul>
		</div>

	<div class="top_section" style="width: unset;">

		<h1>О НАС</h1>
		
	</div>	

<div class="brands_page_wrapper">
<div class="contacts_wrapper">

	<p style="text-align: left; width: 49%; margin-top: 3%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>

	<p style="text-align: left; width: 49%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<img src="../../images/64d4dedfde90c8269d7dd448705b2e4c.jpg" align="center" style="width: 63%;
    margin-left: 17%; margin-top: 5%;">
    <p style="text-align: left; width: 19%; margin-top: 3%;">Ждём вас в гости!</p><br>

</div>
</div>




		</main>

<!-- конец контента !-->

<!-- начало футера !-->

		<footer>

			<div class="logo_wrapper">

				<a href="../../index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

<div class="footer_filling">
			<ul>
				<li><a href="../../menu/about_us/">О НАС</a></li>
				<li><a href="../../menu/stocks/">АКЦИИ</a></li>
				<li><a href="../../menu/delivery/">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="../../menu/contacts/">КОНТАКТЫ</a></li>
				<li><a href="../../menu/bonus/">БОНУСНАЯ ПРОГРАММА</a></li>
				<?php 

			if ($_SESSION['user']) {
				echo "<li><a href=personal_account/>АККАУНТ</a></li>";
			}
			else
			{
				echo "<li><a href=#reg_form>АККАУНТ</a></li>";
			}

			?>
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


</body>
</html>



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
	