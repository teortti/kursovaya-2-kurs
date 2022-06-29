

<?php 
include_once '../connect_db.php';

$id_user=$_GET['id_user'];
$id_category=$_GET['id_category'];
$id_section=$_GET['id_section'];
$id_goods=$_GET['id_goods'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ножницы - интернет-магазин канцелярских товаров</title>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css">
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
		<li class="menu__item"><a href="adding.php">Добавление</a></li>
	
		<li class="menu__item"><a href="../controllers/exit.php">Выйти</a></li>
    </ul>
  </div>


			<div class="menu">
				<nav>
					<ul class="menu_nav">
						<li><a href="../admin/index.php">Пользователи, категории, разделы</a></li>
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
			<li class="breadcrumb-item"><a href="../index.php">Вернуться на главную</a></li>
		</ul>
		</div>
	<div class="top_section">

		

		<h1>ВЫ НА СТРАНИЦЕ ОБНОВЛЕНИЯ ДАННЫХ</h1>
		
	</div>	

	<div class="personal_account_data">
		<h1>ПОЛЬЗОВАТЕЛИ</h1>

		<div class="last_orders_wrapper">

<form class="edit_profile" method="POST">
	<?php 

	$str_select_user="SELECT * FROM `users` WHERE id='$id_user'";
	$run_select_user=mysqli_query($connect, $str_select_user);
	$out_user=mysqli_fetch_array($run_select_user);

	?>
				<input type="text" name="name" placeholder="Имя" class="reg_form_input edit_account" value="<?php echo $out_user[name] ?>">
				<input type="text" name="surname" placeholder="Фамилия" class="reg_form_input edit_account" value="<?php echo $out_user[surname] ?>">
				<input type="text" name="login" placeholder="Логин (эл.почта или телефон)" class="reg_form_input edit_account" value="<?php echo $out_user[login] ?>">
				<input type="password" name="password" placeholder="Пароль" class="reg_form_input edit_account">
				<input type="password" name="r_password" placeholder="Подтверждение пароля" class="reg_form_input edit_account">

				
				<div class="str_gender">Пол</div>

				<div class="gender">
				<input type="radio" name="gender" value="f">Женский
				<input type="radio" name="gender" value="m">Мужской
				<input type="radio" name="gender" value="o">Не хочу говорить
				</div>

				<input type="text" name="tel_number" placeholder="Номер телефона" class="reg_form_input edit_account" value="<?php echo $out_user[tel_number] ?>">
				<input type="text" name="city_and_country" placeholder="Город, страна" class="reg_form_input edit_account" value="<?php echo $out_user[city_and_country] ?>">
				<input type="text" name="adress" placeholder="Адрес (улица, дом, квартира)" class="reg_form_input edit_account" value="<?php echo $out_user[adress] ?>">


				<input type="submit" name="edit" value="СОХРАНИТЬ" class="reg_form_input auth">

			</form>

</div>
</div>

<?php 



$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$password=$_POST['password'];
$r_password=$_POST['r_password'];
$gender=$_POST['gender'];
$tel_number=$_POST['tel_number'];
$city_and_country=$_POST['city_and_country'];
$adress=$_POST['adress'];


$edit=$_POST['edit'];

				

				if ($edit) {
					if ($name && $surname && $login && $password && $r_password && $gender) {
						if ($password==$r_password) {
				$password=md5($password);
				$str_upd_user="UPDATE `users` SET `name`='$name',`surname`='$surname',`gender`='$gender',`login`='$login',`password`='$password', `tel_number`='$tel_number', `city_and_country`='$city_and_country', `adress`='$adress' WHERE id='$id_user'";
				$run_upd_user=mysqli_query($connect, $str_upd_user);
				echo "Данные успешно обновлены";
					}
					else
					{
						echo "Пароли не совпадают";
					}
					
				}
					else
					{
						echo "Что-то не заполненно";
					}

			}

				?>





				<div class="personal_account_data">
		<h1>КАТЕГОРИИ</h1>

		<div class="last_orders_wrapper">

<form class="edit_profile" method="POST">
	<?php 

	$str_select_category="SELECT * FROM `category` WHERE id='$id_category'";
	$run_select_category=mysqli_query($connect, $str_select_category);
	$out_category=mysqli_fetch_array($run_select_category);

	?>
				<input type="text" name="cat_name" placeholder="Название категории" class="reg_form_input edit_account" value="<?php echo $out_category[cat_name] ?>">
				<input type="number" name="category_id" placeholder="Номер категории" class="reg_form_input edit_account" value="<?php echo $out_category[category_id] ?>">
				<input type="text" name="folder_name" placeholder="Название категории" class="reg_form_input edit_account" value="<?php echo $out_category[folder_name] ?>">


				<input type="submit" name="edit_category" value="СОХРАНИТЬ" class="reg_form_input auth">

			</form>


<?php 


$cat_name=$_POST['cat_name'];
$category_id=$_POST['category_id'];
$folder_name=$_POST['folder_name'];
$edit_category=$_POST['edit_category'];


				

				if ($edit_category) {
					if ($cat_name && $category_id && $folder_name && $edit_category) {

				$str_upd_category="UPDATE `category` SET `cat_name`='$cat_name',`category_id`='$category_id',`folder_name`='$folder_name' WHERE id='$id_category'";
				$run_upd_category=mysqli_query($connect, $str_upd_category);
				echo "Данные успешно обновлены";
					}
					
					else
					{
						echo "Что-то не заполненно";
					}

					}

				?>


</div>
</div>

<div class="personal_account_data">
		<h1>РАЗДЕЛЫ</h1>

<?php 

	$str_select_section="SELECT * FROM `sections` WHERE id='$id_section'";
	$run_select_section=mysqli_query($connect, $str_select_section);
	$out_section=mysqli_fetch_array($run_select_section);

	?>
		
			<div class="last_orders_wrapper">
				<form method="POST" class="edit_profile">
					<input type="text" name="section_name" class="reg_form_input" placeholder="Название раздела" value="<?php echo $out_section[section_name];?>">
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
					<input type="number" name="section_id" class="reg_form_input" placeholder="Номер категории" value="<?php echo $out_section[section_id];?>">
					<input type="submit" name="edit_section" class="reg_form_input auth" VALUE="СОХРАНИТЬ"><br>
					<?php 
$section_name=$_POST['section_name'];
$category=$_POST['category'];
$section_id=$_POST['section_id'];
$edit_section=$_POST['edit_section'];



	if ($edit_section) {
if ($section_name && $category && $section_id) {
	$str_upd_section="UPDATE `sections` SET `section_name`='$section_name',`category_id`='$category',`section_id`='$section_id' WHERE id='$id_section'";

				$run_upd_section=mysqli_query($connect, $str_upd_section);
				echo "Данные успешно обновлены";


}

else
{
	echo "Что-то не заполнено";
}	
		} 
					?>
				</form>



<div class="personal_account_data">
		<h1>ТОВАРЫ</h1>

<?php 

	$str_select_goods="SELECT * FROM `goods` WHERE id='$id_goods'";
	$run_select_goods=mysqli_query($connect, $str_select_goods);
	$out_goods=mysqli_fetch_array($run_select_goods);

	?>
		
			<div class="last_orders_wrapper">
				
<form method="POST" enctype="multipart/form-data" class="edit_profile">
		<input type="text" name="name" placeholder="Название" class="reg_form_input" value="<?php echo $out_goods[product_name] ?>">
		<input type="text" name="price" placeholder="Цена" class="reg_form_input" value="<?php echo $out_goods[price] ?>">
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
		</select>
		

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
		</select>

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
		</select>
<input type="text" name="brand" placeholder="Бренд" class="reg_form_input" value="<?php echo $out_goods[brand] ?>">
</select>
		Добавить изображение:<input type="file" name="img" placeholder="Изображение" style="border: none;">

<textarea name="desc" placeholder="Описание" class="reg_form_input" value="<?php echo $out_goods[description] ?>"></textarea>
		<input type="submit" name="add_product" value="ДОБАВИТЬ ТОВАР" class="reg_form_input auth">
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

	$str_out_goods="SELECT * FROM `goods` WHERE product_name='$name' OR product_pic='$name_img'";
	$str_upd_goods="UPDATE `goods` SET `product_name`='$name',`price`='$price',`category`='$id_category',`section`='$section',`brand`='$brand',`product_pic`='$name_img',`add_time`=CURRENT_TIMESTAMP,`description`='$desc',`folder_name`='$folder_name' WHERE id='$id_goods'";

	$run_out_goods=mysqli_query($connect, $str_out_goods);
	$count_goods=mysqli_num_rows($run_out_goods);
	$found_goods=mysqli_fetch_array($run_out_goods);


	if ($add_product ) {
if ($name && $price && $brand && $name_img && $desc && $folder_name) {
	if ($count_goods==1) {
			echo "Такой товар уже существует";
		}

		else{
			$run_upd_goods=mysqli_query($connect, $str_upd_goods);

		if ($run_upd_goods) {
				echo "Данные успешно обновлены";
			} 
			else 
			{
				echo "Ошибка при обновлении товара";
			}
		}
}

else
{
	echo "Что-то не заполнено";
}	
		} 
		?>
	</form><br>


		</div>
	</div>



			</main>