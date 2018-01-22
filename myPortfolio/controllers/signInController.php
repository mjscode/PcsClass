<?php

    /*function add_to_session($asosArray){
        $_SESSION["logged"]=true;
        foreach($asosArray as $key=>$value){
            $_SESSION[$key]=$value;
        }
    }*/
    include 'utils/sessionBuilder.php';

    if(isset($_POST['logIn']) || isset($_POST['register'])){
        include 'utils/db.php';
        if (isset($_POST['logIn'])){
            if(!empty($_POST['username']) && !empty($_POST['userPassword'])){
            
                $userName=$_POST['username'];
                $userPass=$_POST['userPassword'];
                    
                include 'models/signInModel.php';    
            
            } else{
                $error="in order to login you need to enter both fields";
            }
        }else{
            include 'registerController.php';
        }
    }
    $styles=".formHeader{border-bottom:1px solid black; margin-bottom: 3%}
     #signInForm{padding:2% 0% 0% 0%; margin-bottom:5%;}
     #registerForm{margin-top:5%;}";
    include 'views/signInView.php';
    ?>