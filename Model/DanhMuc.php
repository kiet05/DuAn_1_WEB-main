<?php
class DanhMuc{
    public $conn = null;
    public function __construct()
    {
        $this->conn = connection();
    }
    public function all(){
        $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //hàm insert dữ liệu
    public function insert($data){
        $sql = "INSERT INTO danhmuc(ten_danhmuc) VALUES(:ten_danhmuc)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //hàm update dữ liệu
    public function update($data){
        $sql = "UPDATE danhmuc SET ten_danhmuc=:ten_danhmuc WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Xóa dữ liệu
    public function delete($id){
        $sql = "DELETE FROM danhmuc WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
