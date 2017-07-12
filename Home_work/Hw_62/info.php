<?php
 
   
    function info(){
         if(!isset($_POST['choice'])){
        die("choice is necessary");
    }
    else{
        $choice=$_POST['choice'];
    }
     try {
          $cs = "mysql:host=localhost;dbname=seforim";
    $user = "myuser";
    $password = 'power';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);

        $query = "SELECT * FROM seforim WHERE name = '$choice'";
        $results = $db->query($query);
        foreach($results as $key=>$value)
            $array=['name'=>$value['name'], 'price'=> $value ['price'], 'Quantity'=> $value['Quantity']];
        return $array;
             } catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
        
    }
    }
    $info_ar=info();
    $choice=$_POST['choice'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Seforim Sale</title>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class=container>
    <header class="jumbotron text-center">
        <h1>Our Seforim</h1>
        <h4>pick a sefer to find out info!</h4>
        </header>
        <div class="well"><?php 
                
               
                echo "the price for $choice is {$info_ar['price']}, and we have {$info_ar['Quantity']} in stock";
                ?></div>
               
</body>
</html>