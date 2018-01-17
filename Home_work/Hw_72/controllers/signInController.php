<?php

    function add_to_session($asosArray){
        foreach($asosArray as $key=>$value){
            $_SESSION[$key]=$value;
        }
        $_SESSION['logged']=true;
    }

    if(isset($_GET['logIn']) || $_POST){
        include 'utils/db.php';
        if (isset($_GET['logIn'])){
            if(!empty($_GET['userName']) && !empty($_GET['userPassword'])){
            
                $userName=$_GET['userName'];
                $userPass=$_GET['userPassword'];
                    
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