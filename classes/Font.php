<?php
class Font {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function uploadFont($file_name, $font_Name, $full_path) {
        $file_name= $file_name;
        $sql = "INSERT INTO fonts (`file_name`, `font_name`, `file_path`) VALUES ('$file_name', '$font_Name', '$full_path')";
        if($this->conn->query($sql)) {
            return true;
        }
        return false;
    }

    public function fontList() {
        $sql = "SELECT * FROM fonts ORDER BY uploaded_at DESC";
        return $result = $this->conn->query($sql); 
    }

    public function deleteFont($id) {
        $sql = "SELECT id, file_path FROM fonts where id= '$id' ";
        $query = $this->conn->query($sql);
        $result = $query->fetch_assoc();
        $delete_font_file = $result['file_path'];
        if($query->num_rows > 0) {
            unlink("../".$delete_font_file); // remove file from upload folder
            $delete_sql = "DELETE  from fonts where id= '$id' ";
            $delete_font = $this->conn->query($delete_sql);
            return true;
        } 
        return false;

    }
}
