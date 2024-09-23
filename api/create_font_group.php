<?php
include_once '../Database.php';
include_once '../classes/FontGroup.php';

$database = new Database();
$db = $database->dbConnection();
$fontGroup = new FontGroup($db);

if($_REQUEST['group_title']){
    $group_title = $_REQUEST['group_title'];
    $fonts = json_decode($_REQUEST['fonts']);
    $font_names_array= [];
    $font_ids_array= [];
    foreach($fonts as $font){
        array_push($font_names_array, $font->font_name);
        array_push($font_ids_array, $font->font_id);
    }
    $font_names = count($font_names_array) > 0 ?  implode(",", $font_names_array) : [];
    $font_ids = count($font_ids_array) > 0 ? implode(",", $font_ids_array) : [];
    
    $group_create = $fontGroup->createGroup($group_title, $font_names, $font_ids);
    if($group_create){
        echo json_encode(['success'=> 200, 'message' => 'Group create successfully']);
    }else {
        echo json_encode(['success'=> 400, 'message' => 'Group create failed']);
    }
    
}

?>