<?php
    if(! empty($_GET['categoryId'])){
        $categoryValue=$_GET['categoryId'];
        if(gettype($categoryValue)==='array'){
                foreach($categoryValue as $value){
                    $id[]=$value;
            }
        }else{
            $id=$_GET['categoryId'];
        }
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
    if(! empty($_GET['search'])){
        //$id=$_GET['searchCatagory'];
    }
    include 'models/catalogModel.php';
    include 'views/catalogView.php';
?>