<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Корзина - интернет-магазин Ножницы</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header>

			<div class="logo_wrapper">

				<a href="index.html"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

			<div class="smth_near_logo">

				<div class="search_wrap">
				<form method="GET">
			<input type="text" name="search" placeholder="Поиск по сайту" class="search">
			<button type="submit"></button>
				</form>
				</div>


			<div class="header_icons">

			<a href="shopping_cart.html"><div class="shopping_cart"></div></a>
			<a href="favorites.html"><div class="favorites"></div></a>
			<a href="#reg_form"><div class="user_account"></div></a>
				
			</div>

			</div>

			</div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="about_us.html">О НАС</a></li>

						<div class="drpdwn_catalog">
						<li><a href="#">КАТАЛОГ</a></li>
						<div class="catalog_content">
							<nav>
								<ul>
									<li><a href="category.html">Категория 1</a></li>
									<li><a href="category.html">Категория 2</a></li>
									<li><a href="category.html">Категория 3</a></li>
									<li><a href="category.html">Категория 4</a></li>
									<li><a href="category.html">Категория 5</a></li>
									<li><a href="category.html">Категория 6</a></li>
									<li><a href="category.html">Категория 7</a></li>
									<li><a href="category.html">Категория 8</a></li>

								</ul>
							</nav>
						</div>
						</div>

						<li><a href="stocks.html">АКЦИИ</a></li>
						<li><a href="brands.html">БРЕНДЫ</a></li>
						<li><a href="delivery.html">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="contacts.html">КОНТАКТЫ</a></li>
						<li><a href="bonus.html">БОНУСНАЯ ПРОГРАММА</a></li>
						
					</ul>
				</nav>
			</div>


		</header>

<!-- конец шапки !-->

<!-- начало контента !-->

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Корзина</li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>КОРЗИНА</h1>
		
	</div>	


<div class="shopping_cart_wrapper">
		
<div class="shopping_cart_filled">
	<div class="order_pic"></div>
	<div class="order_info">
		<div class="order_name">Название товара</div>
		<div class="order_ammount"><input type="number" min="1" max="20" value="1"></div>
		<div class="order_price"><b>99999999 Р</b></div>
		<div class="delete_order">X</div>
	</div>
</div>


<div class="total_price">Итого: 99999999 Р</div>

<div class="discount_code_wrapper">
<div class="discount_code">
	Код для скидки:
	<input type="text" name="">
</div>
</div>

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
	