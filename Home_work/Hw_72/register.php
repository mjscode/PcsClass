<?php
include "httpsonly.php";
  $cs = "mysql:host=localhost;dbname=security";
    $user = "myuser";
    $password = 'power';
if(!empty($_POST['name'])&&!empty($_POST['password'])){
        $name=$_POST['name'];
        $pass= $_POST['password']; 
}elseif(!empty($_POST['name'])xor !empty($_POST['password'])){
    $error="in order to register you need to enter both fields";
}
    if(!empty($name)){
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "INSERT INTO USERS (`userName`, `password`) VALUES (:name,:pass)";
        $hashP=  password_hash($_POST['password'], PASSWORD_DEFAULT);  
    $statement = $db->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('pass', $hashP);
    $statement->execute();
    $statement->closeCursor();
    $success="welcome $name, your name and password $pass and $hashP have been entered";
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
}

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
<form method="post">
<label>enter a username<label>
<input type="text" id="name" name="name" placeholder="userName" required>
<label>enter a password<label>
<input type="text" id="password" name="password" placeholder="password" required>
<input type="submit" value="register"/>
<br>
<?php
if (!empty($error)){
    echo $error;
}elseif(!empty($success)){
    echo $success;
}
?>
</form>
</body>
</html>