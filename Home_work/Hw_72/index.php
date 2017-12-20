<?php
    include "utils/httpsonly.php";
    include "utils/link.php";
session_start();

$action = "signin";
if(!empty($_GET["action"])) {
    $action = $_GET["action"];
}

switch($action) {
    case "register":
        include "controllers/registerController.php";
        exit;
    case "signin": 
        include "controllers/signinController.php";
        exit;
    case "homepage":
        include 'controllers/homeController.php';;
        exit;
    case "logout":
        include "utils/logOut.php";
        exit;
    case "info":
        include "info.php";
        exit;
    default:
        die("Dont know how to $action");
}
?>