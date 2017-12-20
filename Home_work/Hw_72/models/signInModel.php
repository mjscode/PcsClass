<?php
    include 'utils/db.php';
    if ($_GET){
            if( !empty($userName) && !empty($userPass)){
                try {
                    $query = "Select password, admin, name from USERS where userName = :userName";
                    $statement = $db->prepare($query);
                    $statement->bindValue('userName', $userName);
                    $statement->execute();
                    $array =$statement->fetch(PDO::FETCH_ASSOC);;
                    $password=$array['password'];
                    $admin=$array['admin'];
                    $admin=$array['name'];
                    $statement->closeCursor();

                    if(empty($password)){
                        $error='user name is invalid';
                    } else{
                        if(password_verify($userPass, $password)){
                            $_SESSION['logged']=true;
                            $_SESSION['name']=$name;
                            $_SESSION['admin']=$admin;
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
}
?>