<?php 

session_start();



include_once ('../../connect_db.php');
error_reporting(0);
$id_category=$_GET['id_category'];
$id_section=$_GET['id_section'];

$str_out_section="SELECT * FROM `sections` WHERE section_id='$id_section'";
$run_out_section=mysqli_query($connect, $str_out_section);
$out_section=mysqli_fetch_array($run_out_section);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Купить <?php echo "$out_section[section_name]"; ?> в интернет-магазине Ножницы</title>
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
			<li class="breadcrumb-item"><a href="../../../index.php">Главная </a></li>
<?php
			$str_out_category_name="SELECT * FROM `category` WHERE category_id='$out_section[category_id]'";
$run_out_category_name=mysqli_query($connect, $str_out_category_name);
$out_cat_name=mysqli_fetch_array($run_out_category_name);

?>
			<li class="breadcrumb-item "><?php echo "<a href='../../category/?id_category=$out_section[category_id]'> $out_cat_name[cat_name]"; ?></a></li>
			<li class="breadcrumb-item active_brdcrmb"><?php echo "$out_section[section_name]"; ?> </li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1><?php echo "$out_section[section_name]"; ?></h1>
		
	</div>	


<div class="catalog_wrapper">
		
	<div class="left_section">
		<h2>РАЗДЕЛЫ</h2>
		<nav>
			<ul>
				<?php 

									$str_out_section="SELECT * FROM `sections` WHERE category_id='$out_section[category_id]'";

									$run_out_section=mysqli_query($connect, $str_out_section);

									if ($run_out_section) {
										while ($out_section=mysqli_fetch_array($run_out_section)) {
	
											echo "
											
										<li><a href='../sections/?id_section=$out_section[section_id] '> $out_section[section_name]</a></li>
										
											";
										}
									}

									?>
			</ul>
		</nav>

<form method="POST" name="myForm">

		<h2>ЦЕНА</h2>

<nav>
	

			<ul>

							<li><input type='checkbox' name="cheap[]" class='in_stock' value="По убыванию"<?php foreach($_POST['cheap'] as $key){if($key == 'По убыванию'){ echo "checked";} }?>>По убыванию</li>
							<li><input type='checkbox' name="rich[]" class='in_stock' value="По возрастанию"<?php foreach($_POST['rich'] as $key){if($key == 'По возрастанию'){ echo "checked";} }?>>По возрастанию</li>
						
			</ul>
		</nav>

			

		<h2>БРЕНД</h2>
<div class="brends">
<nav>
	

			<ul>

				<?php 

$str_out_brands="SELECT count( `id` ) AS `post_count`, `brand` FROM `goods` WHERE section='$id_section' GROUP BY `brand` ORDER BY `brand`";



						$run_out_brands=mysqli_query($connect, $str_out_brands);

						while ($out_brands=mysqli_fetch_array($run_out_brands)):   ?>	 

							<li><input type='checkbox' name="brand[]" class='in_stock' value=<?php echo $out_brands[brand]; ?> <?php foreach($_POST['brand'] as $key){if($key == $out_brands[brand]){ echo "checked";} }?>>  <?php echo $out_brands[brand]; ?></li>
						

							<?php endwhile; ?>
			</ul>
		</nav>
		</div>

			<input type="submit" name="confirm_filters" value="ПРИМЕНИТЬ ФИЛЬТР(Ы)" class="clear_filters" style="font-size: 20px;">
			<input type="submit" name="clear_filters" value="ОЧИСТИТЬ ФИЛЬТР(Ы)" class="clear_filters" style="font-size: 20px;">
			

</form>
	</div>


<div class="goods_container goods_container_on_main">
		<div class="goods goods_on_main">

			<?php 


             
            
$confirm_filters=$_POST['confirm_filters'];
$clear_filters=$_POST['clear_filters'];





if ($confirm_filters) {
	$rich=$_POST['rich'];
	$cheap=$_POST['cheap'];
	$brand=$_POST['brand'];

foreach ($_POST['brand'] as $element){
		
if ($rich=='' AND $cheap=='') {
	
	$str_out_filter="SELECT * FROM `goods` WHERE brand='$element' LIMIT 10 ";
$run_out_filter=mysqli_query($connect, $str_out_filter);

	while ($out_goods_by_brand=mysqli_fetch_array($run_out_filter)) {
		echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods_by_brand[folder_name]/$out_goods_by_brand[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods_by_brand[id] $out_goods_by_brand[product_name]' ><div class=product_title>$out_goods_by_brand[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods_by_brand[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods_by_brand[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods_by_brand[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";


}
}
elseif($rich=='' AND $cheap!=='' AND $brand!==''){
	$str_out_filter="SELECT * FROM `goods` WHERE brand='$element' ORDER BY price DESC LIMIT 10 ";
$run_out_filter=mysqli_query($connect, $str_out_filter);

	while ($out_goods_by_brand=mysqli_fetch_array($run_out_filter)) {
		echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods_by_brand[folder_name]/$out_goods_by_brand[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods_by_brand[id] $out_goods_by_brand[product_name]' ><div class=product_title>$out_goods_by_brand[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods_by_brand[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods_by_brand[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods_by_brand[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";


}
}
elseif($rich=='' AND $cheap!=='' AND $brand==''){
	$str_out_filter="SELECT * FROM `goods` ORDER BY price DESC LIMIT 10 ";
$run_out_filter=mysqli_query($connect, $str_out_filter);

	while ($out_goods_by_brand=mysqli_fetch_array($run_out_filter)) {
		echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods_by_brand[folder_name]/$out_goods_by_brand[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods_by_brand[id] $out_goods_by_brand[product_name]' ><div class=product_title>$out_goods_by_brand[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods_by_brand[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods_by_brand[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods_by_brand[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";


}
}

elseif ($cheap=='' AND $rich!=='' AND $brand!=='') {
	$str_out_filter="SELECT * FROM `goods` WHERE brand='$element' ORDER BY price ASC LIMIT 10 ";
$run_out_filter=mysqli_query($connect, $str_out_filter);

	while ($out_goods_by_brand=mysqli_fetch_array($run_out_filter)) {
		echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods_by_brand[folder_name]/$out_goods_by_brand[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods_by_brand[id] $out_goods_by_brand[product_name]' ><div class=product_title>$out_goods_by_brand[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods_by_brand[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods_by_brand[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods_by_brand[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";


}

}
elseif ($cheap=='' AND $rich!=='' AND $brand=='') {
	$str_out_filter="SELECT * FROM `goods` ORDER BY price ASC LIMIT 10 ";
$run_out_filter=mysqli_query($connect, $str_out_filter);

	while ($out_goods_by_brand=mysqli_fetch_array($run_out_filter)) {
		echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods_by_brand[folder_name]/$out_goods_by_brand[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods_by_brand[id] $out_goods_by_brand[product_name]' ><div class=product_title>$out_goods_by_brand[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods_by_brand[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods_by_brand[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods_by_brand[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";


}

}

  
}
}
	elseif ($clear_filters) {


		$str_out_goods="SELECT * FROM `goods` WHERE section='$id_section' AND id > 5 LIMIT 15";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}
	}



elseif(!$confirm_filters){
		$str_out_goods="SELECT * FROM `goods` WHERE section='$id_section' AND id > 5 LIMIT 15";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class='product on_main'>
				<img src='../../images/товары/$out_goods[folder_name]/$out_goods[product_pic]' class='image image_on_main'>
				<div class='product_info product_info_on_main'>
					<a href='../../category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=../../shopping_cart/?id_product=$out_goods[id]><div class='shopping_cart buy_product'></div></a>
						<a href=../../favorites/?id_product_fav=$out_goods[id]><div class='favorites fav_product'></div><a/>
					</div>
				</div>
			</div>

	";
						}

}



						?>

</div>

	
<div class="pagination">
	
</div>

<?php /* ?>

	<div class="pagination">
	<div class="pages">
		<a href="#" class="disabled">&laquo;</a>
		<a href="#" class="pagination_item active">1</a>
		<a href="#" class="pagination_item">2</a>
		<a href="#" class="pagination_item">3</a>
		<a href="#" class="pagination_item">4</a>
		<a href="#" class="disabled">&raquo;</a>
	</div>
</div>
<?php */ ?>

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
				<li><a href="../../menu/about_us/">О НАС</a></li>
				<li><a href="../../menu/stocks/">АКЦИИ</a></li>
				<li><a href="../../menu/delivery/">ДОСТАВКА И ОПЛАТА</a></li>
				<li><a href="../../menu/contacts/">КОНТАКТЫ</a></li>
				<li><a href="../../menu/bonus/">БОНУСНАЯ ПРОГРАММА</a></li>
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

			<div class="or_reg">Или <a href="#registration">зарегистрируйтесь</a></div>
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
	