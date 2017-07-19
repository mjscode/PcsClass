<?php
    $cs = "mysql:host=localhost;dbname=test";
    $user = "myuser";
    $password = 'power';
    $success=false;
    $name='';
    // this is for taking the whole table in one array and working from there.
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
         $query = "Select * from students";
         $results = $db->query($query);
        $studentAr = $results->fetchAll(PDO::FETCH_ASSOC);
        $results->closeCursor();
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }

    //this is to delete.
        if(isset($_POST['name'])){
        $dname=$_POST['name'];
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>student grades</h1>
        </div>
        </div>
   
    <div class="container">
         <?php
            echo "<div class='well well-sm'>";
            echo "<h4>".$studentAr[0]['name']."</h4>";
            echo " has a grade of ".$studentAr[0]['grade'];
    $name=$studentAr[0]['name'];
    $index=2;
        for ($i=1; $i < count($studentAr) ; $i++) { 
            if($studentAr[$i]['name']===$name){
                echo " and ".$studentAr[$i]['grade'];
            }else{
                $name=$studentAr[$i]['name'];
                echo "</div>";
                echo "<div class='well well-sm'>";
                echo "<h4>".$studentAr[$i]['name']."</h4>";
                echo " has a grade of ".$studentAr[$i]['grade'];
            }
        }
        echo "</div>"; 
        ?>
          <form class="form-inline"  method ="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Enter the name of a student to delete:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"   required
                        value="<?=$dname?>"
                    >
                     <div class="row">
            <button type="submit" class="btn btn-default">Delete</button>
            </div>
            </form>
            <?php if($success){?>
            <div class="alert alert-success">
            <ul>
                <?php echo "your student has been deleted";?>
            </ul>
            <?php };?>
        </div>
    </div>
    </body>
</html>