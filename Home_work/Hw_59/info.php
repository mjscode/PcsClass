<?php
$name="";
$years=0;
$languages=["Java","Python", "PHP", "Java Script"];

if($_GET){
    if(!empty($_GET['name'])) { 
        
       $name = $_GET['name'];
     }else {
        $errors[]="name is a required field";
    }

    if(isset($_GET['years'])) {
        if(! is_numeric($_GET['years']) || $_GET['years'] < .5 || $_GET['years'] > 50){
            $errors[]="that can't be the right number of years";
        }
        $years = $_GET['years'];
    } else {
        
        $errors[]="years is a required field";
    }
    
    if(!empty($_GET['languages'])) {
       
        $preffered = $_GET['languages'];
    } else {
       
        $errors[]="languages is a required field";
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
</head>

<body>  
        <div class="container">
        <?php if(!empty($errors)) :?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors as $error) echo "<li> $error </li>" ?>
          <?php else : ?>
                <h3> you submitted correctly! <h3>      
                </ul>
            </div>
        <?php endif ?>
        
        <div class="row">
            <div class="col-smll-4">Name: <?php echo $name ?></div>            
        </div>  
        <div class="row">
            <div class="col-smll-4">Years: <?php echo $years ?></div>            
        </div>
        <div class="row">
            <?php if(!$_GET) : ?>
            <div class="col-smll-4">Avaible languages: <?php 
            foreach($languages as $language) echo $language, " " ?></div>   
            <?php else : ?>
            <div class="col-smll-4">Preffered languages: <?php 
            foreach($preffered as $index) echo $languages[$index], " " ?></div>            
            <?php endif ?>
        </div>    
        

        <form class="form" >
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Please enter your name:</label>
                <div class="col-sm-10">
                    <input class="form-control" id="name" name="name" xrequired>
                </div>
            </div>
            <div class="form-group">
                <label for="years" class="col-sm-4 control-label">How many years have you been coding?</label>
                <div class="col-sm-10">
                    <input type="unumber" tmin=".5" hstep=".5" class="form-control" id="years" name="years" xrequired>
                </div>
            </div>
            <div class="row">
                <label for="languages" class="col-sm-4 control-label">Please pick a language:</label>
              <div class="col-sm-offset-4 col-sm-10">
                    <select class="form-control" name="languages[]" multiple>
                        <?php foreach($languages as $key => $language) : ?>
                        <option value="<?= $key ?>"
                        <?php if (in_array($key, $languages)) echo "selected" //== to allow conversion ?>
                        ><?= $languages[$key] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
</body>

</html>