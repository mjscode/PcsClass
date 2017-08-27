
<?php
 include "utilitys/sdb.php";
 $datab= Database::getInst();
    $ldb=$datab->getDb();
    try {

        $query = "SELECT * FROM seforim WHERE id = :sefer";
            $statement = $ldb->prepare($query);
            $statement->bindValue('sefer', $seferId);
            $statement->execute();
            $choice = $statement->fetch(PDO::FETCH_ASSOC);
            $array=['name'=>$choice['name'], 'price'=>  number_format($choice ['price'], 2), 'Quantity'=>$choice['Quantity']];
              }catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage()); 
    }
    
?>