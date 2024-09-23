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
    $edit_id = $_GET['id'];

    $group_create = $fontGroup->updateGroup($group_title, $font_names, $font_ids, $edit_id);
    if($group_create){
        echo json_encode(['success'=> 200, 'message' => 'Group update successful']);
    }else {
        echo json_encode(['success'=> 400, 'message' => 'Group update failed']);
    }
    
}

?>