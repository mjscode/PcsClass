<?php
  
    function options(){
      $cs = "mysql:host=localhost;dbname=seforim";
    $user = "myuser";
    $password = 'power';
     try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);

        $query = "SELECT * FROM seforim ";
        $results = $db->query($query);
        $seforim = $results->fetchAll();
        $results->closeCursor();
        $string="";
        foreach($seforim as $sefer) {
            $string.= "<option>{$sefer['name']}</option>";
        }
        return $string;
             } catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
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
        <h4>pick a sefer to find out info!</h4>
        </header>
          <form class="form-inline" method="post" action="info.php">
                <label>Choose a Sefer:
            <select name="choice">
                <?php 
                 echo options();
                ?> 
            </select>
            <button type="submit" class="btn btn-default">Get Info</button>
            </form>
            <div class="well">
                <h4>click on the link below to add an entry.</h4>
                <a href="http://localhost/class/Html/Home_work/Hw_63/submission.php">add a sefer</a>

            </div>
            </div>
</body>
</html>