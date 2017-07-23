
<?php
 include "sdb.php";
    try {

        $query = "SELECT * FROM seforim WHERE name = '$info'";
        $results = $db->query($query);
        foreach($results as $key=>$value)
            $array=['name'=>$value['name'], 'price'=>  number_format($value ['price'], 2), 'Quantity'=>$value['Quantity']];
             } catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage()); 
    }
    
?>