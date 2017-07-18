<?php
    $cs = "mysql:host=localhost;dbname=test";
    $user = "myuser";
    $password = 'power';
    $success=false;
    $name='';
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
         $query = "Select * from students";
         $results = $db->query($query);
        $studentAr = $results->fetchAll(PDO::FETCH_ASSOC);
        /*foreach($studentAr as $student)
            echo $student['name'];*/
        $results->closeCursor();
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
    $students=[$studentAr[0]['name'],$studentAr[0]['grade']];
    $name=$studentAr[0]['name'];
    $index=2;
        for ($i=1; $i < count($studentAr) ; $i++) { 
            if($studentAr[$i]['name']===$name){
                $students[]=$studentAr[$i]['grade'];
            }else{
                $name=$studentAr[$i]['name'];
                $students[]=$studentAr[$i]['name'];
                $students[]=$studentAr[$i]['grade'];
            }
        } 
        if(isset($_POST['name'])){
        $name=$_POST['name'];
        try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    $query = "Delete from students where name= :name";
    $statement = $db->prepare($query);
    $statement->bindValue('name', $name);
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

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>

<body>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>student grades</h1>
        </div>
   
    <div class="container">
         <?php
            echo $studentAr[0]['name']." has a grade of ".$studentAr[0]['grade'];
    $name=$studentAr[0]['name'];
    $index=2;
        for ($i=1; $i < count($studentAr) ; $i++) { 
            if($studentAr[$i]['name']===$name){
                echo " and ".$studentAr[$i]['grade'];
            }else{
                $name=$studentAr[$i]['name'];
                echo "<br>";
                echo $studentAr[$i]['name']." has a grade of ".$studentAr[$i]['grade'];
            }
        } 
        ?>
          <form class="form-inline"  method ="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Enter the name of a sefer to delete:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"   required
                        value="<?=$name?>"
                    >
                     <div class="row">
            <button type="submit" class="btn btn-default">Delete</button>
            </div>
            </form>
            <?php if($success){?>
            <div class="alert alert-success">
            <ul>
                <?php echo "your student has been deleted" ?>
            </ul>
            <?php }?>
        </div>
    </div>
    </body>
</html>