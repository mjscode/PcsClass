<?php
   include "sdb.php";
    
         if(empty($_POST['name']) xor empty($_POST['price']) xor empty($_POST['Quantity']))
        $errors[]="in order to add a sefer all fields must be entered.";
        if(empty($errors)){
                    try {
                        $query = "INSERT INTO `seforim`(`name`, `price`, `Quantity`) VALUES (:theNm,:thePr,:theQn)";
                        $statement = $db->prepare($query);
                        $statement->bindValue('theNm', $sNm);
                        $statement->bindValue('thePr', $sPr);
                        $statement->bindValue('theQn', $sQn);
                        $statement->execute();
                        } catch (PDOException $e) {
                            $errors[] = "Something went wrong " . $e->getMessage();
                        }
                        }
     if(isset($_POST['delete'])){
        $dname=$_POST['delete'];
        try {
    $query = "Delete from students where name= :name";
    $statement = $db->prepare($query);
    $statement->bindValue('name', $dname);
    $statement->execute();
    $success=true;
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
        }
try {
    $query = "SELECT * FROM seforim LIMIT 20";
    $results = $db->query($query);
    $seforim = $results->fetchAll();
    $results->closeCursor();
       $string = "";
        foreach($seforim as $sefer) {
            $string.= "<option>{$sefer['name']}</option>";
        }
} catch (PDOException $e) {
    $error[] = "Something went wrong " . $e->getMessage();
}

        ?>