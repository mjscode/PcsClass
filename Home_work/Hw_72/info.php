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
<h3>blah<h3>
<hr>
<h3>blah<h3>
<hr>
<h3>blah<h3>
<hr>
<a href="index.php?action=signin">log out</a>
</body>
</html>