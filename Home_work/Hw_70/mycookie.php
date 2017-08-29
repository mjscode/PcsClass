<?php
    setCookie("yourCookie", time(), 0);
    date_default_timezone_set('America/New_York');
    if(!empty($_COOKIE["yourCookie"])) {
        $time_sec = $_COOKIE["yourCookie"];
        $date = date('l jS \of F Y h:i:s A', $time_sec);
    } else {
        $time_sec = 0;
        $date=0;
    }
    

    //setCookie("ColorCookie", "$color", time() - (60 * 60)); // expire the cookie 1 hour ago
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <style>
    p{
        font-size:300%;
    }
    </style>
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Cookie Site</h1>
        </div>
    </div>
    <div class="container text-center">
            <div class="col-md-12">
                <p>
                <?php
                if(empty($date)){
                    echo "Welcome to our Website!"."<br>"."This is your first time here.";
                }else{
                    echo "Welcome Back!"."<br>"." The last time you visited was"."<br>"."$date.";
                    
                    
                }
                ?>
                </p>
            </div>
            </div>
</body>
</html>
