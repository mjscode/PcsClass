<?php
    include 'utils/db.php';
    include 'utils/house.php';
    if (! empty($houseId)) {
        try {
            $query = "SELECT * FROM houses WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue('id', $houseId);
            $statement->execute();
            $tHouse = $statement->fetch(PDO::FETCH_ASSOC);
            $house=new House($tHouse);
            if (empty($house)) {
                $error = "Unable to find house $houseId";
            }
        } catch(PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
        }
    } else {
        $error = "No house id set to find";
    }
?>