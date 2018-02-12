<?php
    if(! empty($_GET['categoryId'])){
        if(gettype($_GET['categoryId'])==='array'){
            $ids=$_GET['categoryId'];
        }elseif($_GET['categoryId']>0){
            $ids[]=$_GET['categoryId'];
        }
    }
    if(! empty($_GET['searchName'])){
        $search=$_GET['searchName'];
    }else{
        $search='';
    }

    if(! empty($_GET['minPrice'])){
        $min=$_GET['minPrice'];
    }else{
        $min='';
    }
        
    if(! empty($_GET['maxPrice'])){
        $max=$_GET['maxPrice'];
    }else{
        $max='';
    }


    if(! empty($_GET["page"])) {
        if(!is_numeric($_GET["page"])) {
            $errors[] = "page must be a number";
        } else {
            $page = $_GET["page"];
        }
    }
    $sort='categoryId';
    if(! empty($_GET['sort'])){
        $valid=['price_desc','price_asc','categoryId','name'];
        if(in_array($_GET['sort'],$valid)){
            $sort=$_GET['sort'];
        }
    }
    $errors=[];

    include 'models/catalogModel.php';
    include 'views/catalogView.php';
?>