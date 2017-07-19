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
    $cs = "mysql:host=localhost;dbname=seforim";
    $user = "myuser";
    $password = 'power';
    
         if(empty($_POST['name']) xor empty($_POST['price']) xor empty($_POST['Quantity']))
        $errors[]="in order to add a sefer all fields must be entered.";
        if(empty($errors)){
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    $query = "INSERT INTO `seforim`(`name`, `price`, `Quantity`) VALUES (:theNm,:thePr,:theQn)";
    $statement = $db->prepare($query);
    $statement->bindValue('theNm', $sNm);
    $statement->bindValue('thePr', $sPr);
    $statement->bindValue('theQn', $sQn);
    $statement->execute();
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
    $valid=true;
    }}
     if(isset($_POST['dname'])){
        $dname=$_POST['dname'];
        try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    $query = "Delete from students where name= :name";
    $statement = $db->prepare($query);
    $statement->bindValue('name', $dname);
    $statement->execute();
    $success=true;
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
        }
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
        <h4>To add a sefer fill out the form below.</h4>
        </header>
        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <h4>your insert was not completed!<h4>
            <ul>
                <?php foreach($errors as $error) echo "<li>$error</li>" ?>
            </ul>
            </div>
             <?php elseif(isset($valid)) : ?>
        <div class="alert alert-success">
            <ul>
                <?php echo "<p>Your sefer, the $sNm for the price of $sPr with the amount of $sQn has been added.</p>" ?>
            </ul>
        </div>
            <?php endif ?>
         <form class="form-inline"  method ="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Enter the name of the sefer:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"   required
                        value="<?=$sNm?>"
                    >
            </div>
            <div class="form-group">
            <label for="name" class="col-sm-4 control-label">Enter the price of the sefer:</label>
                <div class="col-sm-4">
                    <input type="number" min="1,00" max="1500.00" class="form-control" id="price" name="price" placeholder="Price" required
                        value="<?=$sPr?>"
                    >
            </div>
            </div>
            <div class="form-group">
                <label for="Quantity" class="col-sm-4 control-label">Enter how many we have in stock:</label>
                <div class="col-sm-4">
                    <input type="number" min="1" max"10000" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required
                        value="<?=$sQn ?>"
                    >
                    </div>
            </div>
            <div class="row">
            <button type="submit" class="btn btn-default">Enter Info</button>
            </div>
            </form>
               <form class="form-inline"  method ="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Enter the name of a sefer to delete:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="dname" placeholder="Name"   required
                        value="<?=$dname?>"
                    >
                     <div class="row">
            <button type="submit" class="btn btn-default">Delete</button>
            </div>
            </form>
    </div>
    </body>
    </html>

