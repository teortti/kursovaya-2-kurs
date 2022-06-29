<?php 
session_start();
include_once ('../connect_db.php');

$id_category=$_GET['search'];
$str_out_category_name="SELECT * FROM `goods` WHERE product_name LIKE '%$id_category%'";
$run_out_category_name=mysqli_query($connect, $str_out_category_name);
$out_name=mysqli_fetch_array($run_out_category_name);


    


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Поиск по запросу <?php echo "$id_category"; ?>  интернет-магазин Ножницы</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>

	<!-- начало шапки !-->
		<header class="on_search">
		

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
										<li><a href='../category/?id_category=$out[category_id]'> $out[cat_name]</a></li>
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

	<div class="top_section">

		

		<h1>По запросу "<?php echo "$id_category"; ?>" найдены товары: <?php echo  $count_goods; ?></h1>
		<div class="sort_goods">
			<span>Сортировка:</span>
			<div class="drpdwn_catalog">
			<li>По умолчанию</li>
			<div class="catalog_content">
			<nav>
				<ul>
					<li><a href="">Сначала новые</a></li>
					<li><a href="">По цене (возрастание)</a></li>
					<li><a href="">По цене (убывание)</a></li>
				</ul>
			</nav>
			</div>

		</div>
	</div>
	</div>	


<div class="catalog_wrapper_on_search">
		
	<div class="left_section">
		<h2>РАЗДЕЛЫ</h2>
		<nav>
			<ul>
				<?php 

									$str_out_section="SELECT * FROM `sections`";

									$run_out_section=mysqli_query($connect, $str_out_section);

									if ($run_out_section) {
										while ($out_section=mysqli_fetch_array($run_out_section)) {
	
											echo "
											
										<li><a href='../category/sections/?id_section=$out_section[section_id]'> $out_section[section_name]</a></li>
										
											";
										}
									}

									?>

			</ul>
		</nav>

<h2>КАТЕГОРИИ</h2>
		<nav>
			<ul>
				<?php 



								$str_out_section="SELECT * FROM `category`";

									$run_out_section=mysqli_query($connect, $str_out_section);

									if ($run_out_section) {
										while ($out_section=mysqli_fetch_array($run_out_section)) {
	
											echo "
											
										<li><a href='../category/?id_category=$out_section[category_id]'> $out_section[cat_name]</a></li>
										
											";
										}
									}

									?>

			</ul>
		</nav>


<h2>НАЛИЧИЕ ТОВАРА</h2>

<div class="are_goods_in_stock">
<input type="checkbox" name="in_stock" class="in_stock"><span class="instock_text">в наличии</span>

</div>

<h2>БРЕНД</h2>
<input type="search" name="search" class="search_brend">
<div class="brends">
<nav>
	

			<ul>
				<?php 

$str_out_brands="SELECT * FROM `goods` WHERE product_name LIKE '%$id_category%'";
						$run_out_brands=mysqli_query($connect, $str_out_brands);

						while ($out_brands=mysqli_fetch_array($run_out_brands)) {
							echo "<li><input type='checkbox' name='in_stock' class='in_stock'><a href='#'>$out_brands[brand]</a> </li>";
						}

				?>				
			</ul>
		</nav>
		</div>

			<input type="submit" name="clear_filters" value="ПРИМЕНИТЬ ФИЛЬТР(Ы)" class="clear_filters" style="font-size: 20px;">
			<input type="submit" name="clear_filters" value="ОЧИСТИТЬ ФИЛЬТРЫ" class="clear_filters">
			
	
	</div>



	<div class="goods_container_on_search">
		<div class="goods">

			<?php 

						$str_out_goods="SELECT * FROM `goods` WHERE product_name LIKE '%$id_category%'";
						$run_out_goods=mysqli_query($connect, $str_out_goods);

						while ($out_goods=mysqli_fetch_array($run_out_goods)) {
							echo "

<div class=product>
				<img src='../images/товары/$out_goods[folder_name]/$out_goods[product_pic]' style='margin-top: 20px;
width: 300px;
	height: 300px;
	background-repeat: no-repeat;
	background-size: 300px;
	margin-left: 30px;'>
				<div class=product_info>
					<a href='../category/products/?id_goods=$out_goods[id] $out_goods[product_name]' ><div class=product_title>$out_goods[product_name] </div></a>
					
					<div class=product_footer>
						<div class=product_price>$out_goods[price] Р</div>
						<a href=../shopping_cart/?id_product=$out_goods[id]><div class=shopping_cart buy_product></div></a>
						<div class=favorites fav_product></div>
					</div>
				</div>
			</div>

	";
						}

						

						?>

		

	</div>




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
	