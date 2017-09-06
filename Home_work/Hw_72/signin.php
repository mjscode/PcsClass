<?php
include "httpsonly.php";
$login=false;
  $cs = "mysql:host=localhost;dbname=security";
    $user = "myuser";
    $password = 'power';
if(!empty($_POST['name'])&&!empty($_POST['password'])){
        $name=$_POST['name'];
        $pass=$_POST['password'];      
}elseif(!empty($_POST['name'])xor !empty($_POST['password'])){
    $error="in order to login you need to enter both fields";
}
    if(!empty($name)){
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "Select password from USERS where userName = :name";
    $statement = $db->prepare($query);
    $statement->bindValue('name', $name);
    $statement->execute();
    $fetch =$statement->fetch();
    $user=$fetch[0];
    $statement->closeCursor();
    if(empty($user)){
        $error='user name is invalid';
    }else{
        if(password_verify($pass, $user)){
          $login=true;
        }else{
            $error='password is invalid';
        }
    }
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
}
if($login===true){
       $_SESSION['logged'] =true;
        $_SESSION['name']=$name;
    header("Location: index.php?action=homepage");
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
<h1>Log in page</h1>
<form method="post">
<label>enter your username<label>
<input type="text" id="name" name="name" placeholder="userName" required>
<label>enter your password<label>
<input type="password" id="password" name="password" placeholder="password" required>
<input type="submit" value="login"/>
<br>
<?php
if (!empty($error)){
    echo $error;
}
?>
</form>
</body>
</html>