<?php
    if (!empty($inputArray)){

        if(!empty($userName) && !empty($pass) && !empty($repeat)){
            if($pass===$repeat){
                
                $queryObject=new queryBuilder($inputArray);
                $query=$queryObject->insert_query_string('users');
                
                try {
                    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                    $db = new PDO($cs, $user, $password, $options); 
                    $statement = $db->prepare($query);
                    $queryObject->bindValues($statement);
                    $statement->execute();
                    $statement->closeCursor();
                    add_to_session($inputArray);
                    http_response_code(302);
                    header("Location: index.php?action=homepage");

                } catch (PDOException $e) {
                    if ($e->getCode()==23000){
                        $error="Sorry! that username '".$userName."' is already taken.";
                    }else{
                        echo gettype($e->getCode());
                    $error = "Something went wrong " . $e->getMessage();
                    }
                }
        }else{
            $error="your passwords do not match. Please repeat the same password in order to register.";
        }
        }else{
            $error = "we need you to give a valid User Name and Password in order to registger";
        }
    }
?>