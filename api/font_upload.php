<?php
include_once '../Database.php';
include_once '../classes/Font.php';

$database = new Database();
$db = $database->dbConnection();
$font = new Font($db);

$allowedMimeTypes = ['font/ttf', 'application/octet-stream'];

if (in_array($_FILES['font_file']['type'], $allowedMimeTypes)) {

    if (!file_exists('../uploads/')) {
        mkdir('../uploads/', 0777, true);
    }
    
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["font_file"]["name"]);

    if (move_uploaded_file($_FILES["font_file"]["tmp_name"], $target_file)) {
        $file_name = $_REQUEST['file_name'];
        $font_name = $_REQUEST['font_name'];
        $full_path = "uploads/". $file_name;

        if ($font->uploadFont($file_name, $font_name, $full_path)) {
            echo json_encode(['success'=> 200, 'message' => 'Font uploaded successfully']);
        } else {
            echo json_encode(['success'=> 400, 'message' => 'Font upload failed']);
        }
    }
}else{
    echo json_encode(['error'=> 405, 'message' => 'Only ttf file allowed']);
}
