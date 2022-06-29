<?php 

include_once('../connect_db.php');

?>

<h2>Добавление товаров</h2>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Название"><br><br>
		<input type="text" name="price" placeholder="Цена"><br><br>
		Категория:<select name="id_category">
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
		

		Папка с изображениями:<select name="folder_name">
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

Раздел:<select name="section">
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
<input type="text" name="brand" placeholder="Бренд"><br><br>
</select><br><br>
		Добавить изображение:<input type="file" name="img" placeholder="Изображение"><br><br>

<textarea name="desc" placeholder="Описание"></textarea><br><br>
		<input type="submit" name="add_product" value="Добавить товар"><br>
	</form><br>

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
				echo "Товар добавлен";
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