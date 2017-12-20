<?php
    include 'utils/db.php';

    if ($_POST){
        if(empty($name)){
            $name='';
        }
        if(!empty($regName) && !empty($hashP) && !empty($name)){
            if($pass===$repeat){
            try {
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $db = new PDO($cs, $user, $password, $options);
                $query = "INSERT INTO USERS (`userName`, `password`,'name') VALUES (:regName,:pass,:name)";
                $hashP=  password_hash($pass, PASSWORD_DEFAULT);  
                $statement = $db->prepare($query);
                $statement->bindValue('regName', $regName);
                $statement->bindValue('regPass', $hashP);
                $statement->bindValue('name', $name);
                $statement->execute();
                $statement->closeCursor();

                $_SESSION['logged']=true;
                $_SESSION['name']=$name;
                header("Location: index.php?action=homepage");

            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }else{
            $error="your passwords do not match. Please repeat the same password in order to register."
        }
        }else{
            $error = "we need you to give a valid User Name and Password in order to registger";
        }
    }
?>