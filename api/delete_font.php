<?php
include_once '../Database.php';
include_once '../classes/Font.php';
$database = new Database();
$db = $database->dbConnection();
$font = new Font($db);

$delete_id = $_GET['id'];
if($font->deleteFont($delete_id)){
    echo json_encode(['success'=> 200, 'message' => 'Font delete successful', "data"=>[]  ]);
}else{
    echo json_encode(['success'=> 400, 'message' => 'Sorry operation failed try again', "data"=>[]  ]);
}

?>