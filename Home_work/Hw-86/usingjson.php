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
    $h="hi";
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <script>console.log("<?php echo $contacts ?>")</script>
    </body>
    </html>
