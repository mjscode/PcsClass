<?php
require "db.php";

class pic implements JSONSerializable {
    private $title;
    private $picture;

    public function __construct($title, $picture) {
        $this->title = $title;
        $this->picture = $picture;
    }

    public function JSONSerialize() {
        return get_object_vars($this);
    }
}

if(empty($_GET['id'])) {
    http_response_code(400);
    exit("Id is a required param");
}

$query = "SELECT * from pictures
          WHERE id = :id";

$statement = $db->prepare($query);
$statement->bindValue("id", $_GET['id']);
$statement->execute();
$info = $statement->fetch(PDO::FETCH_ASSOC);;


$pic=new pic($info['title'],$info['pics']);
echo json_encode($pic);
?>