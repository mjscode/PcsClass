<?php
    include 'utils/db.php';
    if($_SESSION['admin']){
        try {

            $query = "delete FROM items where id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id',$deleteId);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $errors[] = "Something went wrong " . $e->getMessage();
        }
    }else{
        $errors[]="Denied! Unauthorized access.";
    }
?>