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

				<div class="search_wrap">
					

				</div>
				
				


			

			</div>

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">

			<li class="active menu__item">Пользователи, категории, разделы</li>
			<li class="menu__item"><a href="goods.php">Товары</a></li>
		<li class="menu__item"><a href="adding.php">Добавление</a></li>
		<li class="menu__item"><a href="orders.php">Заказы</a></li>
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">

		<li><a href="../admin/">Пользователи, категории, разделы</a></li>
			<li><a href="goods.php">Товары</a></li>
		<li><a href="adding.php">Добавление</a></li>
		<li class="active">Заказы</li>

						<li><a href="comments.php">Комментарии</a></li>

	
		<li><a href="../controllers/exit.php">Выйти</a></li>



								</ul>
							</nav>
						</div>
						</div>

					
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

<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ЗАКАЗЫ</h1>
		
			<div class="last_orders_wrapper">
				<table  border="1" width="1500px">
	<tr>
	<th>Номер</th>
	<th>Имя пользователя</th>
	<th>Фамилия пользователя</th>
	<th>Номер телефона</th>
	<th>Эл. почта</th>
	<th>Город, страна</th>
	<th>Адрес места проживания</th>
	<th>Сумма заказа</th>
	<th>Заказанный/е товар/ы</th>
	<th>Статус</th>
	<th>Удаление</th>
	<th>Обновление статуса</th>
</tr>

<?php 


$str_select_orders="SELECT * FROM `orders`";
$run_select_orders=mysqli_query($connect, $str_select_orders);


while ($out_orders=mysqli_fetch_array($run_select_orders)) {

	

		echo "

<tr>
<td>$out_orders[id]</td>
<td>$out_orders[name_user]</td>
<td>$out_orders[surname_user]</td>
<td>$out_orders[tel_number]</td>
<td>$out_orders[email]</td>
<td>$out_orders[city_country]</td>
<td>$out_orders[adress]</td>
<td>$out_orders[price]</td>
<td>$out_orders[goods]</td>	";

echo"<td>";	


switch ($out_orders[status]) {
	case '0':
		echo "Обрабатывается";
		break;
		
		case '1':
		echo "Доставляется";
		break;
		
		case '2':
		echo "Доставлен";
		break;
	

}
echo"</td>";
echo"
<td><a href=cancellations.php?id_order=$out_orders[id]>Удалить</td>
<td><a href=edit_status.php?id_order=$out_orders[id]>Обновить</td>

";


}


?>
</table>
</div>
		</div>

				</main>