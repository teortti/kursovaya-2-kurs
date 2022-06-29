<?php 
include_once('../connect_db.php');

$id=$_GET['id'];
$ammount=$_GET['ammount'];


public function actionUpdate($id){

        $ammount = (int)Yii::$app->request->get('ammount');
        debug($id);
        debug($ammount);

    }

    

    header("Location:../shopping_cart/");



?>