<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!empty($_POST['name']) && !empty($_POST['password'])){
        $name=$_POST['name'];
        $pass= $_POST['password'];
        include 'models/registerModel.php';
}else{
    $error="in order to register you need to enter both fields";
}}
    include 'views/registerView.php';
?>