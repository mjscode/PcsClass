<?php
    $cs = "mysql:host=localhost;dbname=contacts";
    $user = "myuser";
    $password = 'power';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "SELECT * FROM contacts";
        $statement =$db->prepare($query);
        $statement->execute();
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($contacts);

    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>