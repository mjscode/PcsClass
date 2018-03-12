<?php
    $cs = "mysql:host=localhost;dbname=contacts";
    $user = "myuser";
    $password = 'power';
    
    $json = file_get_contents("php://input");
        
    $newContact = json_decode($json,true);
    
    echo $newContact['firstName'];
    
    function getParam($param,$contact) {
        echo $contact[$param];
        if(! empty($contact[$param])) {
            return $contact[$param];
        } 
        return "UNKNOWN";
    }
    
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
   

        
 
        $firstName = getParam("firstName",$newContact);
        $lastName = getParam("lastName",$newContact);
        $email = getParam("email",$newContact);
        $phone = getParam("phone",$newContact);
        
        $query = "INSERT INTO CONTACTS (firstName, lastName, email, phone) 
                    VALUES (:firstName, :lastName, :email, :phone)";
        
        $statement = $db->prepare($query);
        $statement->bindParam("firstName", $firstName);
        $statement->bindParam("lastName", $lastName);
        $statement->bindParam("email", $email);
        $statement->bindParam("phone", $phone);
        
        $rowsInserted = $statement->execute();
        
        if(!$rowsInserted) {
            http_response_code(500);
            exit("Unable to add contact");
        }
        
        http_response_code(201);
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
    //header('HTTP/1.0 500 Internal Server Error');
    http_response_code(500);
    echo $error;
}
?>