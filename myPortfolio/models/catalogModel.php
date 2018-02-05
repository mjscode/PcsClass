<?php
    include 'utils/db.php';
    include 'utils/itemClass.php';

    if(empty($ids)){
        $ids=[];
    }
    function bindValues($value,$key,$statement){
        if(gettype($value)==='integer'){
            $statement->bindParam($key+1,$value,PDO::PARAM_INT);
        }else{

            $statement->bindParam($key+1,$value);
             
        }
    }

    try {
        $query = "SELECT * FROM category";
        $statement = $db->prepare($query);
        $statement->execute();
        $categories= $statement->fetchAll();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $errors[] = "Something went wrong " . $e->getMessage();
    }

    if (empty($page)) {
        $page = 0;
    }

    $numPerPage = 7;

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options); 
        $query = "SELECT i.*, c.name as categoryName
        FROM items i join category c 
        on i.categoryId= c.id where ";

        if(!empty($ids)) {
            $qm = array_fill(0, count($ids), '?');
            $in = join(",", $qm);
                    
            $query .= "(i.categoryId IN ($in)) and ";
        }
        $array=$ids;
        if(!empty($search)){
            $query.="(i.name like concat('%', ?, '%') or c.name like concat('%', ?, '%')) and ";
            $array[]=$search;
            $array[]=$search;
        }
        if(!empty($min)){
            $query.="(price >= ?) and ";
            $array[]=$min;
        }
        if(!empty($max)){
            $query.="(price <= ?) and ";
            $array[]=$max;
        }

        $query.='1 ';
        if(!empty($sort)){

            $query.=" order by ".str_replace('_',' ',$sort);
            
        }

        $query.=" limit ?, ?";
        $array[]=(int)$page * ($numPerPage-1);
        $array[]=(int)$numPerPage;
        $statement = $db->prepare($query);
        array_walk($array,"bindValues",$statement);
        $statement->execute();
        $itemsArray = $statement->fetchAll();

        $more=false;
        
        if(count($itemsArray)===7){
            $more=true;
            array_pop($itemsArray);
        }
        
        $items=[];

        foreach($itemsArray as $itemArray){
            $item=new Item($itemArray);
            $items[]=$item;
        }
        $statement->closeCursor();
        
    } catch (PDOException $e) {
        $errors []= "Something went wrong " . $e->getMessage();
    }

?>