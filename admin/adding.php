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
				
				


			

			</div>

<!-- БУРГЕР МЕНЮ !-->

			<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
						<li class="menu__item"><a href="../admin/index.php">Пользователи, категории, разделы</a></li>
			<li class="menu__item"><a href="goods.php">Товары</a></li>
		<li class="active menu__item">Добавление</li>
		<li class="menu__item"><a href="orders.php">Заказы</a></li>
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../admin/index.php">Пользователи, категории, разделы</a></li>
			<li><a href="goods.php">Товары</a></li>
		<li class="active">Добавление</li>
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


<div class="personal_account_wrapper">


	<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ДОБАВЛЕНИЕ ПОЛЬЗОВАТЕЛЕЙ</h1>



		
			<div class="last_orders_wrapper">
<div class="popup_content reg" style="height: 377px; padding-top: 0px;">
			<form method="POST">
				<input type="text" name="name" placeholder="Имя" class="reg_form_input">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input">
				<input type="password" name="r_password" placeholder="Подтверждение пароля" class="reg_form_input">
				<input type="submit" name="reg" value="ДОБАВИТЬ" class="reg_form_input auth">
			</form>
			<?php 

$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$password=$_POST['password'];
$r_password=$_POST['r_password'];
$reg=$_POST['reg'];


if ($reg) {
	if ($name && $surname && $login && $password && $r_password) {
		$str_check_user="SELECT * FROM `users` WHERE login='$login'";
		$run_check_user=mysqli_query($connect, $str_check_user);
		$count_user=mysqli_num_rows($run_check_user);
	if ($count_user==0) {
			if ($password==$r_password) {
				$password=md5($password);
				
				$str_add_user="INSERT INTO `users`(`name`, `surname`, `login`, `password`) VALUES ('$name','$surname','$login','$password')";

				$run_add_user=mysqli_query($connect, $str_add_user);
				echo "Пользователь успешно добавлен. <a href='../admin/' style='a:hover {color: black; text-decoration: underline;}'>Проверить</a>";
}
else 
				{
					echo "Пароли не совпадают";

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
</div>


		

<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ДОБАВЛЕНИЕ КАТЕГОРИЙ</h1>
		
			<div class="last_orders_wrapper">

				<form method="POST">
					<input type="text" name="cat_name" placeholder="Название категории" class="reg_form_input">
					<input type="number" name="category_id" placeholder="Номер категории" class="reg_form_input">
					<input type="text" name="folder_name" placeholder="Название папки с изображениями" class="reg_form_input">
					<input type="submit" name="add_category" value="ДОБАВИТЬ КАТЕГОРИЮ" class="reg_form_input auth">
					<br>
					<?php 
$cat_name=$_POST['cat_name'];
$category_id=$_POST['category_id'];
$folder_name=$_POST['folder_name'];
$add_category=$_POST['add_category'];

$str_add_goods="INSERT INTO `category`(`cat_name`, `category_id`, `folder_name`) VALUES ('$cat_name','$category_id','$folder_name')";
	$str_out_goods="SELECT * FROM `category` WHERE cat_name='$cat_name' OR category_id='$category_id'";

	$run_out_goods=mysqli_query($connect, $str_out_goods);
	$count_goods=mysqli_num_rows($run_out_goods);
	$found_goods=mysqli_fetch_array($run_out_goods);


	if ($add_category) {
if ($cat_name && $category_id && $folder_name) {
	if ($count_goods==1) {
			echo "Такая категория уже существует";
		}

		else{
			$run_add_goods = mysqli_query($connect,$str_add_goods);

		if ($run_add_goods) {
				echo "Категория добавлена. <a href='../admin/' style='a:hover {color: black; text-decoration: underline;}'>Проверить</a>";
			} 
			else 
			{
				echo "Ошибка при добавлении категории";
			}
		}
}

else
{
	echo "Что-то не заполнено";
}	
		} 
		else 
		{
			echo "Введите категорию";
		}


					?>
				</form>
				
</div>
		</div>

<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ДОБАВЛЕНИЕ РАЗДЕЛОВ</h1>


		
			<div class="last_orders_wrapper">
				<form method="POST">
					<input type="text" name="section_name" class="reg_form_input" placeholder="Название раздела">
					Выберите категорию:<select name="category">
						<?php
			$str_out_category="SELECT * FROM `category`";
			$run_out_category=mysqli_query($connect,$str_out_category);
		
			
		
			 while ($out_cat=mysqli_fetch_array($run_out_category)) {

	 		echo "
	 		<option value=$out_cat[category_id]>$out_cat[cat_name]</option>
	 		";
	 }


?>
					</select>
					<input type="number" name="section_id" class="reg_form_input" placeholder="Номер раздела">
					<input type="submit" name="add_section" class="reg_form_input auth" VALUE="ДОБАВИТЬ РАЗДЕЛ"><br>
					<?php 
$section_name=$_POST['section_name'];
$category=$_POST['category'];
$section_id=$_POST['section_id'];
$add_section=$_POST['add_section'];

$str_add_goods="INSERT INTO `sections`(`section_name`, `category_id`, `section_id`) VALUES ('$section_name','$category','$section_id')";
	$str_out_goods="SELECT * FROM `sections` WHERE section_name='$section_name' OR section_id='$section_id'";

	$run_out_goods=mysqli_query($connect, $str_out_goods);
	$count_goods=mysqli_num_rows($run_out_goods);
	$found_goods=mysqli_fetch_array($run_out_goods);


	if ($add_section) {
if ($section_name && $category && $section_id) {
	if ($count_goods==1) {
			echo "Такой раздел уже существует";
		}

		else{
			$run_add_goods = mysqli_query($connect,$str_add_goods);

		if ($run_add_goods) {
				echo "Раздел добавлен. <a href='../admin/' style='a:hover {color: black; text-decoration: underline;}'>Проверить</a>";
			} 
			else 
			{
				echo "Ошибка при добавлении раздела";
			}
		}
}

else
{
	echo "Что-то не заполнено";
}	
		} 
		else 
		{
			echo "Введите раздел";
		}


					?>
				</form>


		</div>
	</div>


	<div class="personal_account_data">
		<h1 align="center"  style="margin-bottom: 1%;">ДОБАВЛЕНИЕ ТОВАРОВ</h1>
		
			<div class="last_orders_wrapper">
				
<form method="POST" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Название" class="reg_form_input"><br><br>
		<input type="text" name="price" placeholder="Цена" class="reg_form_input"><br><br>
		Категория:<select name="id_category" class="reg_form_input">
			<?php
			$str_out_category="SELECT * FROM `category`";
			$run_out_category=mysqli_query($connect,$str_out_category);
		
			
		
			 while ($out_cat=mysqli_fetch_array($run_out_category)) {

	 		echo "
	 		<option value=$out_cat[category_id]>$out_cat[cat_name]</option>
	 		";
	 }


?>
		</select><br><br>
		

		Папка с изображениями:<select name="folder_name" class="reg_form_input">
			<?php
			$str_out_category="SELECT * FROM `category`";
			$run_out_category=mysqli_query($connect,$str_out_category);
		
			
		
			 while ($out_cat=mysqli_fetch_array($run_out_category)) {

	 		echo "
	 		<option value=$out_cat[folder_name]>$out_cat[folder_name]</option>
	 		";
	 }


?>
		</select><br><br>

Раздел:<select name="section" class="reg_form_input">
			<?php
			$str_out_section="SELECT * FROM `sections`";
			$run_out_section=mysqli_query($connect,$str_out_section);
		
			
		
			 while ($out_section=mysqli_fetch_array($run_out_section)) {

	 		echo "
	 		<option value=$out_section[section_id]>$out_section[section_name]</option>
	 		";
	 }


?>
		</select><br><br>
<input type="text" name="brand" placeholder="Бренд" class="reg_form_input"><br><br>
</select><br><br>
		Добавить изображение:<input type="file" name="img" placeholder="Изображение" style="border: none;"><br><br>

<textarea name="desc" placeholder="Описание" class="reg_form_input"></textarea><br><br>
		<input type="submit" name="add_product" value="ДОБАВИТЬ ТОВАР" class="reg_form_input auth"><br>
	<?php 

$name=$_POST['name'];
$price=$_POST['price'];
$id_category=$_POST['id_category'];
$section=$_POST['section'];
$brand=$_POST['brand'];
$desc=$_POST['desc'];
$img=$_POST['img'];
$add_product=$_POST['add_product'];
$folder_name=$_POST['folder_name'];
	

	$type_img=$_FILES['img']['type'];
	$name_img=$_FILES['img']['name'];
	$size_img=$_FILES['img']['size'];
	$tmp_name_img=$_FILES['img']['tmp_name'];
	$path_img="../images/$name_img";


	$str_add_goods="INSERT INTO `goods`(`product_name`, `price`, `category`, `section`, `brand`, `product_pic`, `description`, `folder_name`) VALUES ('$name','$price','$id_category','$section','$brand','$name_img', '$desc', '$folder_name')";
	$str_out_goods="SELECT * FROM `goods` WHERE product_name='$name' OR product_pic='$name_img'";

	$run_out_goods=mysqli_query($connect, $str_out_goods);
	$count_goods=mysqli_num_rows($run_out_goods);
	$found_goods=mysqli_fetch_array($run_out_goods);


	if ($add_product ) {
if ($name && $price && $brand && $name_img && $desc && $folder_name) {
	if ($count_goods==1) {
			echo "Такой товар уже существует";
		}

		else{
			$run_add_goods = mysqli_query($connect,$str_add_goods);

		if ($run_add_goods) {
				echo "Товар добавлен <a href='goods.php' style='a:hover {color: black; text-decoration: underline;}'>Проверить</a>";
			} 
			else 
			{
				echo "Ошибка при добавлении товара";
				echo $str_add_goods;
			}
		}
}

else
{
	echo "Что-то не заполнено";
}	
		} 
		else 
		{
			echo "Выберите товар";
		}
		?>
	</form><br>


		</div>
	</div>





		</main>
		