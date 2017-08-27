<?php
include 'classes.php';
$action = "first";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'first':
        new Frame('firstP.php');
        exit;
    case 'second':
        new Frame('secondP.php');
        exit;
    case 'third':
        new Frame('thirdP.php');
        exit;
    default:
        $error = "Dont know how to $action";
        new Frame('error.php');
        exit;
}

?>