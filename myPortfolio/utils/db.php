<?php
    $cs = "mysql:host=localhost;dbname=mytest";
    $user = "your DB u/n";
    $password = 'your password';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>
