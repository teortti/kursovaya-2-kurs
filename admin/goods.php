<?php 

include_once ('../connect_db.php');

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
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<header id="header">
<div class="header_wrapper">
			<div class="logo_wrapper">

				<a href="../курсовая 2 курс/index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
				<span class="logo_desc">Интернет-магазин канцтоваров</span>


			</div>

			<div class="smth_near_logo">
		

			</div>

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
			<li class="menu__item"><a href="../admin/index.php">Пользователи, категории, разделы</a></li>
			<li class="active menu__item">Товары</li>
		<li class="menu__item"><a href="adding.php">Добавление</a></li>
		<li class="menu__item"><a href="orders.php">Заказы</a></li>
		
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../admin/index.php">Пользователи, категории, разделы</a></li>
			<li class="active">Товары</li>
		<li><a href="adding.php">Добавление</a></li>
		<li><a href="orders.php">Заказы</a></li>

						<li><a href="comments.php">Комментарии</a></li>
	
		<li><a href="../controllers/exit.php">Выйти</a></li>
					</ul>
				</nav>
			</div>
			</div>
</div>

		</header>

		<main >

	<div class="top_section">

		

		<h1>АДМИН ПАНЕЛЬ</h1>
		
	</div>	


<div class="personal_account_wrapper" style="margin-left: 0%">
<div class="personal_account_data">
	<h1 align="center"  style="margin-bottom: 1%;">ТОВАРЫ</h1>
		<div class="last_orders_wrapper">
<table  border="1">
	<tr>
	<th>Номер</th>
	<th>Название картинки</th>
	<th>Название папки, в которой находится картинка</th>
	<th>Название товара</th>
	<th>Цена (в рублях)</th>
	<th>Категория</th>
	<th>Раздел</th>
	<th>Бренд</th>
	<th>Описание</th>
	<th>Обновление</th>
	<th>Удаление</th>
</tr>



<?php 

$str_select_goods="SELECT * FROM `goods`";
$run_select_goods=mysqli_query($connect, $str_select_goods);


while ($out_goods=mysqli_fetch_array($run_select_goods)) {
$str_select_category="SELECT * FROM `category` WHERE id='$out_goods[category]'";
$run_select_category=mysqli_query($connect, $str_select_category);

$str_select_section="SELECT * FROM `sections` WHERE id='$out_goods[section]'";
$run_select_section=mysqli_query($connect, $str_select_section);

while ($out_category=mysqli_fetch_array($run_select_category)) {

while ($out_section=mysqli_fetch_array($run_select_section)) {

	
		echo "

<tr>
<td>$out_goods[id]</td>
<td>$out_goods[product_pic]</td>
<td>$out_goods[folder_name]</td>
<td>$out_goods[product_name]</td>
<td>$out_goods[price]</td>
<td>$out_category[cat_name]</td>
<td>$out_section[section_name]</td>
<td>$out_goods[brand]</td>
<td>$out_goods[description]</td>
<td><a href=edit.php?id_goods=$out_goods[id]>Обновить</td>
<td><a href=delete_product.php?delete_id=$out_goods[id]>Удалить</td>



	";
}
}
}

?>
</tr>
</table>
	</div>

</div>


		</main>
		