<?php
require 'db.php';

$query = "SELECT * FROM recipes";
$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($rows);
echo json_encode($rows);
?>