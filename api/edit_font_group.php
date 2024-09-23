<?php
include_once '../Database.php';
include_once '../classes/FontGroup.php';

$database = new Database();
$db = $database->dbConnection();
$fontGroup = new FontGroup($db);

$edit_id = $_GET['id'];
$query = $fontGroup->getFontGroup($edit_id);

if($query->num_rows > 0) {
    $result = $query->fetch_assoc();
    echo json_encode(['success'=> 200, 'message' => 'font group found', "data"=> $result]);  
}else{
    echo json_encode(['error'=> 400, 'message' => 'font group not found', "data"=>[] ]);  
} 
