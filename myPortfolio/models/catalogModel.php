<?php
    include 'utils/db.php';
    include 'utils/itemClass.php';

    if (empty($page)) {
        $page = 0;
    }
    function getId($ids){
        $string='';
        if(gettype($ids)==='array'){
            foreach($ids as $id){
                if($string!==''){
                    $string.=" or ";
                }
                $string.='i.categoryId=:'.$id;
            }
        }else{
                $string="id = '' OR i.categoryId=:id";
        }
        }
    
    function bindId($statement,$ids){
        if(gettype($ids)==='array'){
            foreach($ids as $id){
                $statement->bindValue("$id",$id);
            }
        }else{
                $statement->bindValue(":id",$ids);
            }
        }

    $numPerPage = 7;

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options); 

        $query = "SELECT i.*, c.name as categoryName
        FROM items i join category c 
        on i.categoryid= c.id WHERE". 
        getId($id)." order by i.categoryId
        LIMIT :page, :perPage";
    
        $statement = $db->prepare($query);
        if(gettype($id)==='array'){
            foreach($id as $i){
                $statement->bindValue("$i",$i);
            }
        }else{
                $statement->bindValue(":id",$id);
            };
        $statement->bindValue('page', (int)$page * ($numPerPage-1), PDO::PARAM_INT);
        $statement->bindValue('perPage', $numPerPage, PDO::PARAM_INT);
    
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
        $error = "Something went wrong " . $e->getMessage();
    }

?>