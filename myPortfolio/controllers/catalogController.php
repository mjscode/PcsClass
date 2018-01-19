<?php
    if(! empty($_GET['categoryId'])){
        $id=$_GET['categoryId'];
    }else{
        $id='';
    }

    if(! empty($_GET["page"])) {
        if(!is_numeric($_GET["page"])) {
            $errors[] = "page must be a number";
        } else {
            $page = $_GET["page"];
        }
    } 
    include 'models/catalogModel.php';
    include 'views/catalogView.php';
?>