
<?php
 include "utilitys/sdb.php";
    try {

        $query = "SELECT * FROM seforim WHERE id = :sefer";
            $statement = $db->prepare($query);
            $statement->bindValue('sefer', $seferId);
            $statement->execute();
            $choice = $statement->fetch(PDO::FETCH_ASSOC);
            if(empty($choice))
                echo $seferId;
       // foreach($choice as $key=>$value)
            $array=['name'=>$choice['name'], 'price'=>  number_format($choice ['price'], 2), 'Quantity'=>$choice['Quantity']];
              }catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage()); 
    }
    
?>