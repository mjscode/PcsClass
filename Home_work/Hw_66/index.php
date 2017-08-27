<?php
    $action = "seforim";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    if(file_exists("controllers/" . $action . "Controller.php")) {
    include "controllers/" . $action . "Controller.php";
} else {
    $errors[] = "Sorry! We do not have the page '$action'";
    include "views/error.php";
}
    /*switch($action){
        case 'main':
            include "controllers/seforimController.php";
            exit;
        case 'info':
            include "controllers/infoController.php";
            exit;
        default:
            $error = "Sorry! We do not have the page '$action'";
            include 'views/error.php';
            exit;
    
    }*/
?>