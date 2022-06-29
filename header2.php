<?php 

include_once ('connect_db.php');

$query = "SELECT * FROM goods";
$req = mysqli_query($connect, $query);
$data_from_db = [];

while ($result = mysqli_fetch_array($req)) {
	$data_from_db[] = $result;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ножницы - интернет-магазин канцелярских товаров</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<header id="header">
<div class="header_wrapper">
			<div class="logo_wrapper">

				<a href="../курсовая 2 курс/"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

			<div class="smth_near_logo">

				<div class="search_wrap">
					
				<form method="GET" action="search/">
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
			<a href="shopping_cart/"><div class="shopping_cart"></div></a>
			<a href="favorites/"><div class="favorites fav"></div></a>
			<?php if ($_SESSION['user']['role']==0): ?>
			<a href="personal_account/"><div class="user_account"></div></a>

		<?php elseif ($_SESSION['user']['role']==1):?>
			<a href="admin/"><div class="user_account"></div></a>

		<?php endif; ?>
			</div>

			</div>

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
			<li><a href="menu/about_us/" class="menu__item">О НАС</a></li>
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
										<li><a href='category/?id_category=$out[category_id] '> $out[cat_name]</a></li>
											";
										}
									}

									?>


								</ul>
							</nav>
						</div>
						</div>
			<li><a href="menu/stocks/" class="menu__item">АКЦИИ</a></li>
			<li><a href="brands/" class="menu__item">БРЕНДЫ</a></li>
						<li><a href="menu/delivery/" class="menu__item">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="menu/contacts/" class="menu__item">КОНТАКТЫ</a></li>
						<li><a href="menu/bonus/" class="menu__item">БОНУСНАЯ ПРОГРАММА</a></li>
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
										<li><a href='category/?id_category=$out[category_id] '> $out[cat_name]</a></li>
											";
										}
									}

									?>


								</ul>
							</nav>
						</div>
						</div>

						<li><a href="menu/stocks/">АКЦИИ</a></li>
						<li><a href="brands/">БРЕНДЫ</a></li>
						<li><a href="menu/delivery/">ДОСТАВКА И ОПЛАТА</a></li>
						<li><a href="menu/contacts/">КОНТАКТЫ</a></li>
						<li><a href="menu/bonus/">БОНУСНАЯ ПРОГРАММА</a></li>
					</ul>
				</nav>
			</div>
			</div>
</div>

		</header>
		