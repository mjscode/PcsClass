<?php
    include '../utils/db.php';
    session_start();
    $string='';
    if($_SESSION['admin']){
        if( isset($_POST['name'])&& isset($_POST['unit'])
            && isset($_POST['price']) && isset($_POST['stock'] )
            && isset($_POST['category'])){
                $name=$_POST['name'];
                $unit=$_POST['unit'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
                if($stock==' '){
                    $stock=0;
                }
                $category=$_POST['category'];
        try {

            $query = "INSERT INTO `items`(`categoryId`, `name`, 
            `amount`,`unit`, `price`)
             VALUES (:category,:itemName,:stock,:unit,:price)";
            $statement = $db->prepare($query);
            $statement->bindValue('category',$category);
            $statement->bindValue('itemName',$name);
            $statement->bindValue('stock',$stock);
            $statement->bindValue('unit',$unit);
            $statement->bindValue('price',$price);
            $rowAdded=$statement->execute();
            if(!$rowAdded){
                $string='insertion failed';
            }
            $statement->closeCursor();

        } catch (PDOException $e) {
            $string = "Something went wrong " . $e->getMessage();
        }
    }else{
        $string="All proper info required.";
    }
    }else{
        $string="Denied! Unauthorized access.";
    }
    if(!empty($string)){
        http_response_code(500);
        exit("Unable to add item, ".$string);
    };


?>   
