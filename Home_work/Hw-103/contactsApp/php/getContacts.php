<?php
      header("Access-Control-Allow-Origin: *");
    $cs = "mysql:host=localhost;dbname=contacts";
    $user = "myuser";
    $password = 'power';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
        $query = "SELECT * FROM contacts";
    $stmt = $db->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($rows);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
        //header('HTTP/1.0 500 Internal Server Error');
        http_response_code(500);
        echo $error;
    }


?>