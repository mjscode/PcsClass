<?php
    include '../utils/db.php';
    session_start();
    $string='';
    if($_SESSION['admin']){
        if(!empty($_POST['delete'])){
            $deleteId=$_POST['delete'];
        try {

            $query = "delete FROM items where id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id',$deleteId);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="Delete id required.";
    }
    }else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to delete contact, ".$string);
    //echo json_encode($errors);
    };
?>