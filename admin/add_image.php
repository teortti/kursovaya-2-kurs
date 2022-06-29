<?php 

include_once('../connect_db.php');

?>

<h2>Добавление брендов</h2>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="name_image" placeholder="Название"><br>
		Добавить изображение:<input type="file" name="img" placeholder="Изображение"><br>
		<input type="submit" name="add_image" value="Добавить изображение"><br>
	</form><br>

	<?php 

	$name_image=$_POST['name_image'];
	$img=$_POST['img'];
	$add_image=$_POST['add_image'];
	

	$type_img=$_FILES['img']['type'];
	$name_img=$_FILES['img']['name'];
	$size_img=$_FILES['img']['size'];
	$tmp_name_img=$_FILES['img']['tmp_name'];
	$path_img="../images/$name_img";


	$str_add_goods="INSERT INTO `brands`(`brand_name`, `picture`) VALUES ('$name_image','$name_img')";


	if ($add_image) {
		
		}
		$run_add_goods = mysqli_query($connect,$str_add_goods);
		if ($run_add_goods) {
				echo "Товар добавлен";
			 
			else 
			{
				echo "Ошибка при добавлении товара";
				echo $str_add_goods;
			}
			
		} 
		else 
		{
			echo "Выберите товар";
		}

		print_r($_FILES);
		
?>	