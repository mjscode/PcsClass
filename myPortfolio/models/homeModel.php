<?php
include 'utils/db.php';
include 'utils/categoryClass.php';
include 'utils/generalCategory.php';


try {
    
    $query="SELECT c.id as id, c.name as name, 
    c.picture as picture, min(i.price) as cheapest, max(i.price) as expansive, 
    COUNT(i.name) as selection, 
    (SELECT name from items g 
    where g.categoryId=i.categoryId order by rand() 
    limit 1) as example                                         
    from category c left join items i 
    on c.id=i.categoryId 
    GROUP by categoryId 
    order by categoryId desc";

    $statement = $db->prepare($query);
    $statement->execute();
    $categoriesArray= $statement->fetchAll();
    $general=new generalCategory();
    $categories=[];

    foreach ($categoriesArray as $categoryArray) {
        $category=new Category($categoryArray);
        $general->addCategory($category);
        $_SESSION['catagories']=[$category['name']=>$category['id']];
        $categories[]=$category;
    }
    $general->finishObject();
    $categories[]=$general;
    
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>