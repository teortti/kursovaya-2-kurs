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

				<a href="../index.php"><span class="logo">НОЖНИЦЫ</span></a><br>
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

		<li class="active">Пользователи, категории, разделы</li>
			<li><a href="goods.php">Товары</a></li>
		<li><a href="adding.php">Добавление</a></li>
		<li><a href="orders.php">Заказы</a></li>
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


<div class="personal_account_wrapper">
	

	<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ПОЛЬЗОВАТЕЛИ</h1>



		
			<div class="last_orders_wrapper">
				<table  border="1" width="1500px">
	<tr>
	<th>Имя</th>
	<th>Фамилия</th>
	<th>Тел.номер</th>
	<th>Город и страна проживания</th>
	<th>Адрес (улица, дом, квартира)</th>
	<th>Пол</th>
	<th>Логин</th>
	<th>Обновление</th>
	<th>Удаление</th>
</tr>
				
			
<?php 

$str_select_users="SELECT * FROM `users`";
$run_select_users=mysqli_query($connect, $str_select_users);

while ($out_users=mysqli_fetch_array($run_select_users)) {

switch ($out_users[gender]) {
	case 'o':
		$out_users[gender]="Не хочу говорить";
		break;
		case 'f':
		$out_users[gender]="Женский";
		break;
		case 'm':
		$out_users[gender]="Мужской";
		break;
	
	default:
		$out_users[gender]="Не определен";
		break;
}

	echo "
<tr>
		<td>$out_users[name]</td>
		<td>$out_users[surname]</td>
		<td>$out_users[tel_number]</td>
		<td>$out_users[city_and_country]</td>
		<td>$out_users[adress]</td>
		<td>$out_users[gender]</td>
		<td>$out_users[login]</td>

		<td><a href=edit.php/?id_user=$out_users[id]>Обновить</a></td>
		<td><a href='delete.php?delete_id=$out_users[id]'>Удалить</a></td>
		</tr>
";
}


?>

</table>

		

<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">КАТЕГОРИИ</h1>
		
			<div class="last_orders_wrapper">
				<table  border="1" width="1500px">
	<tr>
	<th>Номер</th>
	<th>Название категории</th>
	<th>Название папки с изображениями</th>
	<th>Обновление</th>
	<th>Удаление</th>
</tr>

<?php 


$str_select_category="SELECT * FROM `category`";
$run_select_category=mysqli_query($connect, $str_select_category);


while ($out_category=mysqli_fetch_array($run_select_category)) {
	
		echo "

<tr>
<td>$out_category[id]</td>
<td>$out_category[cat_name]</td>
<td>$out_category[folder_name]</td>

<td><a href=edit.php/?id_category=$out_category[id]>Обновить</td>
<td><a href=delete_category.php?delete_id=$out_category[id]>Удалить</td>



	";
}


?>
</table>
</div>
		</div>

<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">РАЗДЕЛЫ</h1>


		
			<div class="last_orders_wrapper">
				<table  border="1" width="1500px">
	<tr>
	<th>Номер</th>
	<th>Название раздела</th>
	<th>Название категории</th>
	<th>Номер раздела</th>
	<th>Обновление</th>
	<th>Удаление</th>
</tr>

<?php 


$str_select_sections="SELECT * FROM `sections`";
$run_select_sections=mysqli_query($connect, $str_select_sections);


while ($out_sections=mysqli_fetch_array($run_select_sections)) {
	$str_select_category="SELECT * FROM `category` WHERE category_id='$out_sections[category_id]'";
$run_select_category=mysqli_query($connect, $str_select_category);
while ($out_category=mysqli_fetch_array($run_select_category)) {
	
		echo "

<tr>
<td>$out_sections[id]</td>
<td>$out_sections[section_name]</td>
<td>$out_category[cat_name]</td>
<td>$out_sections[section_id]</td>

<td><a href=edit.php/?id_section=$out_sections[id]>Обновить</td>
<td><a href=delete_section.php?delete_id=$out_sections[id]>Удалить</td>

</tr>

	";
}
}


?>
</table>


		</div>
	</div>


		</main>
		