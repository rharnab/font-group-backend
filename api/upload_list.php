<?php
include_once '../Database.php';
include_once '../classes/Font.php';

$database = new Database();
$db = $database->dbConnection();
$font = new Font($db);

$result = $font->fontList();
$fonts = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode(['success'=> 200, 'message' => 'Font list', "data"=> $fonts]);



?>