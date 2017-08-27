<?php
   include "utilitys/sdb.php";
        if(empty($errors) && !empty($sNm)){
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
        $did=$_POST['delete'];
        try {
    $query = "Delete from seforim where id= :id";
    $statement = $db->prepare($query);
    $statement->bindValue('id', $did);
    $statement->execute();
    $success=true;
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
        }
try {
    if(empty($cat)){
        $query = "SELECT id, name FROM seforim ";
        echo 'hi';
        }
    else
        $query = "SELECT id, name FROM seforim where catrgory='$cat'";
    $results = $db->query($query);
    $seforim = $results->fetchAll();
    $results->closeCursor();
} catch (PDOException $e) {
    $error[] = "Something went wrong " . $e->getMessage();
}
try {
    $query = "SELECT catrgory FROM seforim group by catrgory";
    $results = $db->query($query);
    $catagory = $results->fetchAll();
    $results->closeCursor();
} catch (PDOException $e) {
    $error[] = "Something went wrong " . $e->getMessage();
}

        ?>