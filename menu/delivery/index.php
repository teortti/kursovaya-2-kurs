<?php 
session_start();
include_once('../../connect_db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Доставка и оплата - интернет-магазин Ножницы</title>
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
			<li><a href="../brands/index.php" class="menu__item">БРЕНДЫ</a></li>
						<li><a href="../menu/delivery/index.php" class="menu__item">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="../menu/contacts/index.php" class="menu__item">КОНТАКТЫ</a></li>
						<li><a href="../menu/bonus/index.php" class="menu__item">БОНУСНАЯ ПРОГРАММА</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="menu/about_us/">О НАС</a></li>

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
			<li class="breadcrumb-item"><a href="../../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Доставка и оплата</li>
		</ul>
		</div>

	<div class="top_section">

		<h1>ДОСТАВКА И ОПЛАТА</h1>
		<div class="our_brands">Заказы отправляются с московского склада. Поэтому сроки доставки напрямую зависят от расстояния между Москвой и пунктом назначения.<br><br>

Существует 3 способа получения заказов из интернет-магазина «Ножницы»: самовывоз, курьерская доставка и отправка почтой. Точную стоимость доставки Вы увидите во время оформления заказа.</div>
	</div>	

<div class="brands_page_wrapper">
<div class="contacts_wrapper">

	<div class="requisites">
		<b>Курьерская доставка</b>
		<div class="requisites_info">
			Заказы, доставленные курьерской службой, <b>оплачиваются на нашем сайте или при получении.</b>
<br><br>
<b>Стоимость доставки:</b>
От 420 р. <b>Бесплатно</b> при заказе от <b>2000 ₽</b> *
<br><br>
* Возможность бесплатной курьерской доставки будет отражена при оформлении заказа
Время доставки:<br>
<b>Москва</b> – с 09:00 до 18:00 ежедневно;<br>
<b>Другие города</b> – с 09:00 до 18:00 в будни.<br>
Заказ весом более 10 кг доставляется до подъезда. Подъём на этаж обговаривается отдельно. В офис курьеры доставляют заказ до проходной.
<br><br>
После передачи заказа в курьерскую службу с Вами свяжется менеджер для уточнения деталей. В день доставки Вам позвонит курьер для окончательного подтверждения встречи. Если вес заказа превышает 25 кг, то при доставке он разбивается на два заказа.
<br><br>
После выбора способа доставки Вы сможете ознакомиться с вариантами оплаты.
		</div>
	</div>
	<div class="requisites">
		<b>Почта РФ</b>
		<div class="requisites_info">
			Заказ, доставляемый почтой, можно оплатить <b>на нашем сайте или при получении в почтовом отделении.</b>
<br><br>
Стоимость доставки можно узнать в оформлении заказа.
<br><br>
После комплектации заказа, при наличии АВИА-режима, с вами свяжется наш специалист для согласования стоимости доставки. Как только ваш заказ поступит на Почту России, ему присвоят уникальный номер, который вы получите в письме.
<br><br>
<b>Внимание! Для получения заказа вам необходимо иметь при себе паспорт.</b>
		</div>
	</div>
	<div class="requisites">
		<b>Самовывоз</b>
		<div class="requisites_info">
			Магазины и сети и другие пункты выдачи
		</div>
	</div>

	<div class="requisites">
		<b>Сроки хранения заказов</b>
		<div class="requisites_info">
			<ul type="disc">
				<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">В магазинах «Ножницы» – 14 дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">Связной ТТ – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">PickPoint – 3 рабочих дня. Рабочими днями считаются дни работы конкретного пункта выдачи заказов, </li>это могут быть не только будни, но и выходные;
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">СДЭК – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">BoxBerry – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">IML – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">DPD – 3 календарных дня;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">5post (Пятёрочка) – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">GURU – 7 календарных дней;</li>
<li style="list-style-type: disc;list-style-type: disc;
    margin-right: 13px;
    margin-left: 32px;">СберЛогистика - 7 календарных дней в ПВЗ, 5 календарных дней в почтоматах.</li>
			</ul>
		</div>
	</div>

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
				<li><a href="../about_us/index.php">О НАС</a></li>
				<li><a href="../stocks/index.php">АКЦИИ</a></li>
				<li><a href="../delivery/index.php">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="../contacts/index.php">КОНТАКТЫ</a></li>
				<li><a href="../bonus/index.php">БОНУСНАЯ ПРОГРАММА</a></li>
				<li>
				<?php 

			if ($_SESSION['user']) {
				echo "<a href=../../personal_account/index.php>АККАУНТ</a>";
			}
			else
			{
				echo "<a href=#reg_form>АККАУНТ</a>";
			}

			?>
			</li>
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
	