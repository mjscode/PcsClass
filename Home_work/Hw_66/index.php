<?php
    $action = "main";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }
    switch($action){
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
    
    }
?>