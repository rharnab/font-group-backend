<?php
include_once '../Database.php';
include_once '../classes/FontGroup.php';

$database = new Database();
$db = $database->dbConnection();
$fontGroup = new FontGroup($db);

$result = $fontGroup->groupList();
$groups = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode(['success'=> 200, 'message' => 'font group list', "data"=> $groups]);

?>