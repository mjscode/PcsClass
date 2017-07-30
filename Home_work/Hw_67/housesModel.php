<?php
include 'utils/db.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

$page = 0;
if(!empty($_GET['page'])) {
    $page = $_GET['page'];
}

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);

    $statement->execute();
    $houses = $statement->fetchAll();
    $tempH=[[]];
    $n=0;
    foreach($houses as $h){
           if(count($tempH[$n])<=3){
            $tempH[$n][]=$h;
        }else{
            $tempH[]=[];
            $n+=1;
            $tempH[$n][]=$h;
        }
    }
    $statement->closeCursor();
    $houseP=$tempH[$page];
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>