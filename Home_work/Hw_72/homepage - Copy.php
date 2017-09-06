<?php
if(empty($_SESSION['logged'])){
    die ("you are unauthorized");
}
$name=$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome <?=$name?>!</h1>
<h3>if you'd like to see a list of our clients click below</h3>
<a href="index.php?action=users">Our Clients</a>
<br>
<h3>if you'd like to see info click below</h3>
<a href="index.php?action=info">View Info</a>
<br>
<a href="index.php?action=signin">log out</a>
</body>
</html>