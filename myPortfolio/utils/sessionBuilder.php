<?php
    function add_to_session($asosArray){
        $_SESSION['logged']=true;
        $_SESSION['username']=$asosArray['username'];
        
        if(isset($asosArray['name'])){
            $_SESSION['name']=' '.$asosArray['name'];
        }else{
            $_SESSION['name']='';
        }

        if(!empty($asosArray['admin'])){
            if($asosArray['admin']){
                $_SESSION['admin']=true;
            }
        }
    }
?>