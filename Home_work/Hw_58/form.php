<?php
    if(isset($_POST['name'])) { 
        if ((! is_string($_POST['name'])) || (empty($_POST['name'])))
            die("you must hav a char based name of some sort");
         $name = $_POST['name'];
        }
       
     else {
        die("Name is a required field");
    }

    if(isset($_POST['age'])) {
        if((! is_numeric($_POST['age'])) || ($_POST['age'] < .5) || ($_POST['age'] > 120)){
            die("your age has to be that of at least of a half-year old, and you probably didn't know abe lincoln personaly");
        }
        $age = $_POST['age'];
    } else {
        
        die("Age is a required field");
    }

    if(isset($_POST['email'])) {
        if((! is_string($_POST['email'])) || (empty($_POST['email'] < 1))) {
            die("where do you get your emails from?");
        }
        $email = $_POST['email'];
    } else {
       
        die("Email is a required field");
    }
    if(isset($_POST['rating'])){
        if(($_POST['rating'] < 1) || ($_POST['rating'] > 10)){
            die("please rate bet 1 and 10");
        }
        $rating=$_POST['rating'];
    }
    else{
        $rating="";
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>form</title>
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <div class="container">
        <div class="jumbotron text-center">
            <h1>Something</h1>
            <h2>Results</h2>
        </div>

        <div>
            <div>
                <div class="well col-sm-2 text-right">Name</div>
                <div class="col-sm-10 well"><?= $name ?></div>
            </div>
            <div>
                <div class="well col-sm-2 text-right">Age</div>
                <div class="col-sm-10 well"><?= number_format($age, 2) ?></div>
            </div>
            <div>
                <div class="well col-sm-2 text-right">Email</div>
                <div class="col-sm-10 well"><?= $email ?></div>
            </div>
            <?php
            if($rating != ""){
             echo "<div>";
                echo "<div class='well col-sm-2 text-right'>","Rating","</div>";
                echo "<div class='col-sm-10 well'>",$rating,"</div>";
            echo "</div>";
            }
            ?>
        </div>

    </div>
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>
</body>
</html>