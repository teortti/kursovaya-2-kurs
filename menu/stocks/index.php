<?php 
session_start();
include_once ('../../connect_db.php');


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Акции - интернет-магазин Ножницы</title>
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

		<main >
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../../index.php">Главная</a></li>
			<li class="breadcrumb-item active_brdcrmb">Акции</li>
		</ul>
		</div>

	<div class="top_section">

		<h1>АКЦИИ</h1>
		
	</div>	

<div class="stocks_page_wrapper">

<div class="stocks_container">

	<div class="small_stocks_wrapper">
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
		<div class="small_stocks"></div>
	</div>
</div>

<div class="pagination">
	<div class="pages">
		<a href="#" class="disabled">&laquo;</a>
		<a href="#" class="pagination_item active">1</a>
		<a href="#" class="pagination_item">2</a>
		<a href="#" class="disabled">&raquo;</a>
	</div>
</div>

</div>




		</main>

<!-- конец контента !-->

<!-- начало футера !-->

		<footer>

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

			<?php 

			$login_auth=$_POST['login_auth'];
			$password_auth=$_POST['password_auth'];
			$auth=$_POST['auth'];

			if ($auth) {
$password_auth=md5($password_auth);
				$str_auth="SELECT * FROM `users` WHERE login='$login_auth' && password='$password_auth'";
	$run_auth=mysqli_query($connect, $str_auth);
	$count_user=mysqli_num_rows($run_auth);
	$found_user=mysqli_fetch_array($run_auth);

	if ($count_user==1) {
		echo "Здравствуйте, $found_user[name]";
	}
	else {
		echo "Проблемы с авторизацией";
	}
				
			}


			?>

			<div class="or_reg">Или <a href="#registration">зарегестрируйтесь</a></div>
		</div>
	</div>
</div>

<div class="popup" id="registration">
	<div class="popup_body">
		<div class="popup_content reg">
			<a href="#" class="popup_close">X</a>
			<h4>РЕГИСТРАЦИЯ</h4>
			<form method="POST">
				<input type="text" name="name" placeholder="Имя" class="reg_form_input">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="password" name="r_password" placeholder="Подтверждение пароля" class="reg_form_input">
				<input type="submit" name="reg" value="ЗАРЕГЕСТРИРОВАТЬСЯ" class="reg_form_input auth">
			</form>
			<div class="or_reg">Уже есть аккаунт?<a href="#reg_form">Войдите</a></div>

		</div>
	</div>
<?php 
$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$password=$_POST['password'];
$r_password=$_POST['r_password'];
$reg=$_POST['reg'];


if ($reg) {
	if ($name && $surname && $login && $password==$r_password) {
		$str_check_user="SELECT * FROM `users` WHERE login='$login'";
		$run_check_user=mysqli_query($connect, $str_check_user);
		$count_user=mysqli_num_rows($run_check_user);
	if ($count_user==0) {
			if ($password==$r_password) {
				$password=md5($password);
				
				$str_add_user="INSERT INTO `users`(`name`, `surname`, `login`, `password`) VALUES ('$name','$surname','$login','$password')";

				$run_add_user=mysqli_query($connect, $str_add_user);
				if ($run_add_user) {
					echo "Добро пожаловать, $name";
				}

				else 
				{
					echo "Ошибка при регистрации";
				}
		}
		else
		{
			echo "Пароли не совпадают!";
		}

		}
		else
		{
			echo "Такой пользователь существует!";
		}
						   
	}

	else
	{
		echo "Заполните все поля!";
	}
}

?>

</div>
	</body>
	</html>
	