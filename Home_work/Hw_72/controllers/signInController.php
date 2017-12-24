<?php
    if($_GET || $_POST){
        if ($_GET){
            if(!empty($_GET['userName']) && !empty($_GET['userPassword'])){
            
                $userName=$_GET['userName'];
                $userPass=$_GET['userPassword'];
                    
                include 'models/signInModel.php';    
            
            } else{
                $error="in order to login you need to enter both fields";
            }
        }else{
            if(!empty($_POST['registerName']) && !empty($_POST['registerPassword'])
            && !empty($_POST['repeatPassword'])){
            
                $name=$_POST['name'];
                $email=$_POST['email'];
                $regName=$_POST['registerName'];
                $regPass= $_POST['registerPassword'];
                $repeat=$_POST['repeatPassword'];

                include 'models/registerModel.php';
        
            }else{
            $error="in order to register you need to enter all fields";
            }
        }
    }
    $styles=".formHeader{border-bottom:1px solid black; margin-bottom: 3%} #signInForm{padding:2% 0% 0% 0%; margin-bottom:5%;} #registerForm{margin-top:5%;}";
    include 'views/signInView.php';
    ?>
    <!-- .col-sm-5,col-sm-4{padding:0;}-->