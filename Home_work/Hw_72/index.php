<?php
//require "autoload.php";
include "httpsonly.php";
session_start();

$action = "login";
if(!empty($_GET["action"])) {
    $action = $_GET["action"];
}

switch($action) {
    case "register":
        include "register.php";
        exit;
        case "signin": 
        include "signin.php";
        exit;
    case "homepage":
        include "homepage.php";
        exit;
    case "users":
        include "users.php";
        exit;
    case "info":
        include "info.php";
        exit;
    default:
        die("Dont know how to $action");
}
?>