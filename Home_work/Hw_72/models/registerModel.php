<?php
    include 'utils/db.php';

    if ($_POST){

        $addQnm='';
        $addQvl='';

        if(!empty($name)){
            $addQnm+=", `name`";
            $addQvl+=", :name";
        }else{
            $name='';
        };

        if(!empty(email)){
            $addQnm+=", `email`";
            $addQvl+=", :email";
        }else{
            $email='';
        };

        if(!empty($regName) && !empty($regPass) && !empty($repeat)){
            if($regPass===$repeat){
            try {
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $db = new PDO($cs, $user, $password, $options);

                $query = "INSERT INTO USERS (`userName`, `password`"+
                 $addQnm+") VALUES (:userName, :password"+ $addQvl+")";
                $hashP=  password_hash($regPass, PASSWORD_DEFAULT);  
                $statement = $db->prepare($query);
                $statement->bindValue('userName', $regName);
                $values=explode(", :", $addQvl);
                $statement->bindValue('password', $hashP);
                $statement->bindValue('name', $name);
                $statement->bindValue('email', $email);
                $statement->execute();
                $statement->closeCursor();

                $_SESSION['user']=['userName'=>$regName,
                'name'=>$name, 'admin'=>$admin, 'email'=>$email];
                header("Location: index.php?action=homepage");

            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }else{
            $error="your passwords do not match. Please repeat the same password in order to register.";
        }
        }else{
            $error = "we need you to give a valid User Name and Password in order to registger";
        }
    }
?>