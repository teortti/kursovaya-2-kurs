<?php 
session_start();
include_once 'db.php';

 $send_order_info=$_POST['send_order_info'];
         $str_insert_order="INSERT INTO `orders`(`id_user`, `name_prod`, `created_at`, `total_cost`) VALUES ('".$_SESSION['user']['id_user']."','".$course['name']."',CURRENT_TIMESTAMP,$count)";
        if ($send_order_info){
          $run_insert_order=mysqli_query($connect, $str_insert_order);
          $_SESSION['order_msg']="Спасибо за заказ!";
          header("location: my_goods.php");

        }
        else
        {
        $_SESSION['order_msg']="Что-то пошло не так...";
           header("location: my_goods.php");
        }

?>