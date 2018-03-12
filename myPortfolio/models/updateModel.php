<?php
    include '../utils/db.php';
    session_start();
    $string='';
    if($_SESSION['admin']){
        if(isset($_POST['updateId']) && isset($_POST['unit'])
            && isset($_POST['price']) && isset($_POST['stock'])){
                $updateId=$_POST['updateId'];
                $unit=$_POST['unit'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
        try {

            $query = "update items set unit=:unit, price=:price, amount=:stock where id=:id";
            $statement = $db->prepare($query);
            $statement->bindValue('id',$updateId);
            $statement->bindValue('unit',$unit);
            $statement->bindValue('price',$price);
            $statement->bindValue('stock',$stock);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="All information must be entered.";
    }
    }else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to update item, ".$string);
    };

?>   
?>