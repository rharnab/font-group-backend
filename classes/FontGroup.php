<?php
class FontGroup {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function createGroup($group_title, $font_names, $font_ids) {
        $group_title = htmlspecialchars($group_title);
        $font_names =$font_names;
        $font_ids = $font_ids;

        $sql = "INSERT INTO font_groups  (group_title, font_names, font_ids) VALUES ('$group_title', '$font_names', '$font_ids')";
        if($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function groupList() {
        $sql = 'SELECT * FROM font_groups ORDER BY created_at DESC';
        return $result = $this->conn->query($sql);
    }

    public function getFontGroup($id) {
        $sql = "SELECT * FROM font_groups where id= '$id' ";
        return $query = $this->conn->query($sql);
    }

    public function updateGroup($group_title, $font_names, $font_ids, $id) {
        $group_title = htmlspecialchars($group_title);
        $font_names =$font_names;
        $font_ids = $font_ids;

        $sql = "UPDATE font_groups  set group_title= '$group_title' , font_names= '$font_names', font_ids='$font_ids' where id='$id' ";
        if($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function deleteGroup($id) {
        $delete_sql = "DELETE  from font_groups where id= '$id' ";
        $delete_group = $this->conn->query($delete_sql);
        return true;

    }
}
