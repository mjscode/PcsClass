<?php
    include 'utils/db.php';
    if ($_GET){
            if( !empty($userName) && !empty($userPass)){
                try {
                    $query = "Select * from USERS where username = :username";
                    $statement = $db->prepare($query);
                    $statement->bindValue('username', $userName);
                    $statement->execute();
                    $outputArray =$statement->fetch(PDO::FETCH_ASSOC);
                    $statement->closeCursor(); 
                    $password=$outputArray['password'];
                    if(empty($password)){
                        $error='user name is invalid';
                    } else{
                        if(password_verify($userPass, $password)){

                            unset($outputArray['password']);
                            add_to_session($outputArray);

                            http_response_code(302);
                            header("Location: index.php?action=homepage");
                        } else{
                            $error='password is invalid';
                        }
                    }
                } catch (PDOException $e) {
                        $error = "Something went wrong " . $e->getMessage();
                }
            } else{
                $error="you have not entered a valid name or password";
            };
};
?>