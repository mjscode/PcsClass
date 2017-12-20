<?php
include 'utils/db.php';
include 'utils/house.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

if (empty($page)) {
    $page = 0;
}

$numPerPage = 4;
$tempHouses=[];
$houses=[];

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT :page, :perPage";

    $statement = $db->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('page', (int)$page * $numPerPage, PDO::PARAM_INT);
    $statement->bindValue('perPage', $numPerPage, PDO::PARAM_INT);

    $statement->execute();
    $tempHouses = $statement->fetchAll();
    
    foreach ($tempHouses as $tempHouse) {
        $house=new House($tempHouse);
        $houses[]=$house;
    
    $statement->closeCursor();
    
}
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>