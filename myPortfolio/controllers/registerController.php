<?php

    if (isset($_POST['register'])){

        if(!empty($_POST['username']) && !empty($_POST['password']) 
        && !empty($_POST['repeat'])){

            $userName=$_POST['username'];
            $pass= $_POST['password'];
            $repeat=$_POST['repeat'];
            $inputArray=$_POST;
            unset($inputArray['repeat']);
            unset($inputArray['register']);
            
            include 'utils/queryBuilder.php';
            include 'models/registerModel.php';

        }else{
        $error="in order to register you need to enter all required fields";
        }
    }
    
?>