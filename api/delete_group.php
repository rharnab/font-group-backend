<?php
include_once '../Database.php';
include_once '../classes/FontGroup.php';

$database = new Database();
$db = $database->dbConnection();
$fontGroup = new FontGroup($db);

$delete_id = $_GET['id'];
if($fontGroup->deleteGroup($delete_id)){
    echo json_encode(['success'=> 200, 'message' => 'Group delete successful', "data"=> [] ]);
}else{
    echo json_encode(['success'=> 400, 'message' => 'Sorry operation failed try again', "data"=> []  ]);
}

?>