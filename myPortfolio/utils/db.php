<?php
    $settings=parse_ini_file("../../dbSettings.ini");
    
    $cs = "mysql:host=localhost;dbname=mytest";
    $user = $settings['user'];
    $password = $settings['password'];

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>
