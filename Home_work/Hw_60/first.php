<?php
if(!empty($_POST['color'])){
    if($_POST['color']!=='white')
        $color=$_POST['color'];
}
if(!empty($_POST['font-family'])){
    $family=$_POST['font-family'];
}
if(!empty($_POST['font'])){
    $font=$_POST['font'];
}
if(empty($color)) {
    $color = "black";
}
if(empty($font)){
    $font= "Helvetica Neue, Helvetica, Arial, sans-serif";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            padding-top: 70px;
        }
        nav li{
                text-align:center;
                padding-top:10px;
        }
        *{
            color: <?= $color ?>;
            <?php if(!empty($family))
                    echo "font-family:$family" ;
                else
                echo "font:$font";
                ?>
        }
        nav a{
            color:white;
        }
    </style>    
<body>
    
    <div class="container">        
    <nav class="navbar navbar-inverse navbar-fixed-top">
       <ul >
         <div class="col-md-3 col-lg-3 col-sm-12">
        <li><a href="mainPge.php">Main Page</a></li>
         </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
        <li><a href="blabber.php">Blabber</a></li>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">            
        <li><a href="presidents.php">Presidents</a></li>
            </div>
            </ul> 
  </div>
</nav>
    
       
           
    <div class="container">
    <header class="jumbotron text-center">
        <h1>php website</h1>
        <h4>some stuff here</h4>
        </header>