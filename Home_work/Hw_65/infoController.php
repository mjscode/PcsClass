<?php
 if(!isset($_POST['info'])){
        die("info is necessary");
    }
    else{
        $info=$_POST['info'];
    }
    include "infoModel.php";
    include "infoView.php";
?>