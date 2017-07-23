<?php
$sNm = '';
$sPr = '';
$sQn = '';
$errors=[];
$dname="";

if($_SERVER['REQUEST_METHOD'] == "POST") {
 if(isset($_POST['name'])){
        if(empty($_POST['name'])){
            $errors[] = "A valid name for the sefer must be submitted";

        }else{
        $sNm=$_POST['name'];
        }}
    if(isset($_POST['price'])){
        if(empty($_POST['price']) || !is_numeric($_POST['price'])){
            $errors []="A valid price for the sefer must be submitted";
        }else{
        $sPr=$_POST['price'];
        }}
    if(isset($_POST['Quantity'])){
        if(empty($_POST['Quantity']) || !is_numeric($_POST['Quantity'])){
            $errors []="A valid price for the sefer must be submitted";
        }else{
        $sQn=$_POST['Quantity'];
        }}
        if( empty($_POST['name']) xor empty($_POST['price']) xor empty($_POST['Quantity']) )
        $errors[]="in order to add a sefer all fields must be entered.";
        
        if (empty($errors)){
            $valid=true;
        }
}
include "seforimModel.php";
include "seforimview.php";
?> 