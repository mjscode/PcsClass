<?php
    $pres_array=[["Trump",2017],["Obama",2009],["Bush",20001]];
    $pres_array_assoc=[
        "Trump"=>["name"=>"Trump","year"=>2017],
        "Obama"=>["name"=>"Obama","year"=>2009],
        "Bush"=>["name"=>"Bush","year"=>2001]
        ]
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Our Presidents</h1>
        </div>
    <table class ="table">
    
    <thead>
        <tr>
        <th>President</th>
        <th>Year</th>     
        </tr>
    </thead>
        <tbody>
            <?php
            foreach($pres_array_assoc as $president) {
               echo "<tr>";
            foreach($president as $data){
                echo "<td>",$data, "</td>";
            }
            echo "</tr>";
    }
    
        ?>

    </tbody>
    </table>
    <div class=row></div>
    <table class ="table">
    <thead>
        <tr>
        <th>President</th>
        <th>Year</th>     
        </tr>
    </thead>
        <tbody>
            <?php
        $length=count($pres_array);
        for($i = 0; $i < $length; $i++) {
            echo "<tr>";
            $length2=count($pres_array[$i]);
            for ($j=0; $j <$length2 ; $j++) { 
                echo "<td>",$pres_array[$i][$j],"</td>";
            }
            echo "</tr>";
    }
        ?>
    </div>
</body>
</html>
