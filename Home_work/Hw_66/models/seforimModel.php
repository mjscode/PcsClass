<?php
   include "utilitys/sdb.php";
    $datab= Database::getInst();
    $ldb=$datab->getDb();
        if(empty($errors) && !empty($sNm)){
                    try {
                        $query = "INSERT INTO `seforim`(`name`, `price`, `Quantity`) VALUES (:theNm,:thePr,:theQn)";
                        $statement = $ldb->prepare($query);
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
    $statement = $ldb->prepare($query);
    $statement->bindValue('id', $did);
    $statement->execute();
    $success=true;
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }
        }
try {
    $query = "SELECT id, name FROM seforim";
        if(!empty($categoryFilter)) {
            $qm = array_fill(0, count($categoryFilter), '?');
            $in = join(",", $qm);

            print_r($qm);
            echo "<br>";
            print_r($in);

            $query .= " WHERE catrgory IN ($in)";
        }
        $statement = $ldb->prepare($query);
        
        $statement->execute($categoryFilter);
        $seforim = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement->closeCursor();
} catch (PDOException $e) {
    $error[] = "Something went wrong " . $e->getMessage();
}
try {
    $query = "SELECT catrgory FROM seforim group by catrgory";
    $results = $ldb->query($query);
    $categories = $results->fetchAll(PDO::FETCH_COLUMN);
    $results->closeCursor();
} catch (PDOException $e) {
    $error[] = "Something went wrong " . $e->getMessage();
}

        ?>