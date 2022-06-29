

<?php 
include_once '../connect_db.php';

$id_order=$_GET['id_order'];


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
				
				


			

			</div>

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
						<li class="menu__item"><a href="../admin/">Пользователи, категории, разделы</a></li>
			<li class="menu__item"><a href="goods.php">Товары</a></li>
		<li class="menu__item"><a href="adding.php">Добавление</a></li>
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../admin/">Пользователи, категории, разделы</a></li>
			<li><a href="goods.php">Товары</a></li>
		<li><a href="adding.php">Добавление</li>
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
<div class="breadcrumbs-width">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="../">Вернуться на главную</a></li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>ВЫ НА СТРАНИЦЕ ОБНОВЛЕНИЯ СТАТУСА ЗАКАЗА</h1>
		
	</div>	

	<div class="personal_account_data">
		<div class="last_orders_wrapper">

<form class="edit_profile" method="POST">
	<?php 

	$str_select_user="SELECT * FROM `orders` WHERE id='$id_order'";
	$run_select_user=mysqli_query($connect, $str_select_user);
	$out_user=mysqli_fetch_array($run_select_user);

	?>
				<select name="status" style="width: 268px;height: 62px;font-size: 21px;  margin-left: 12%;">
						<?php
			$str_out_category="SELECT * FROM `status`";
			$run_out_category=mysqli_query($connect,$str_out_category);
		
			
		
			 while ($out_cat=mysqli_fetch_array($run_out_category)) {

	 		echo "
	 		<option value=$out_cat[status] height='71px'
    width='228px'>";
	 		
	 		switch ($out_cat[status]) {
	case '0':
		echo "Обрабатывается";
		break;
	
	case '1':
		echo "Доставляется";
		break;
		
		case '2':
		echo "Доставлен";
		break;
	
	default:
		// code...
		break;
}
	 		
	 		
	 		echo"</option>";
	 		
	 }


?>
					</select>


				<input type="submit" name="edit" value="СОХРАНИТЬ" class="reg_form_input auth">

			</form>

</div>
</div>

<?php 



$status=$_POST['status'];
$edit=$_POST['edit'];

				

				if ($edit) {
					
				$str_upd_user="UPDATE `orders` SET `status`='$status' WHERE id='$id_order'";
				$run_upd_user=mysqli_query($connect, $str_upd_user);
				echo "Статус успешно обновлен.<a href='orders.php'>Проверить</a>";

			}

				?>





			</main>