<?php 

include_once ('../connect_db.php');



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

				<a href="../курсовая 2 курс/"><span class="logo">НОЖНИЦЫ</span></a><br>
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
			<li class="menu__item"><a href="../admin/">Пользователи, категории, разделы</a></li>
			<li class="active menu__item">Товары</li>
		<li class="menu__item"><a href="adding.php">Добавление</a></li>
		<li class="menu__item"><a href="orders.php">Заказы</a></li>
		
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../admin/">Пользователи, категории, разделы</a></li>
			<li><a href="adding.php">Товары</a></li>
		<li><a href="adding.php">Добавление</a></li>
		<li><a href="orders.php">Заказы</a></li>
		<li class="active">Комментарии</li>

	
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
	<h1 align="center"  style="margin-bottom: 1%;">КОММЕНТАРИИ</h1>
		<div class="last_orders_wrapper">
<table  border="1">
	<tr>
	<th>Номер</th>
	<th>Товар</th>
    <th>Имя пользователя</th>
    <th>Содержимое комментария</th>
    <th>Время публикации</th>
	<th>Удаление</th>
</tr>



<?php 

$str_select_comments="SELECT * FROM `comments`";
$run_select_comments=mysqli_query($connect, $str_select_comments);

while ($out_comments=mysqli_fetch_array($run_select_comments)) {
$str_select_goods="SELECT * FROM `goods` WHERE id='$out_comments[id_product]'";
$run_select_goods=mysqli_query($connect, $str_select_goods);
while ($out_goods=mysqli_fetch_array($run_select_goods)) {
	$str_select_users="SELECT * FROM `users` WHERE id='$out_comments[id_user]'";
	$run_select_user=mysqli_query($connect, $str_select_users);
	while ($out_user=mysqli_fetch_array($run_select_user)) {
		
	
		echo "

<tr>
<td>$out_comments[id]</td>
<td>$out_goods[product_name]</td>
<td>$out_user[name]</td>
<td>$out_comments[comment]</td>
<td>$out_comments[add_at]</td>

<td><a href=delete_comment.php?delete_id=$out_comments[id]>Удалить</td>



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
		