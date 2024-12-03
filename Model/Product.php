<?php
class Product
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM sanpham ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM sanpham WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($id, $ten, $gia, $soluongton, $anh, $mota, $iddm, $trangthai)
    {
        $sql = "INSERT INTO sanpham (id, ten, gia, soluongton, anh, mota, iddm, trangthai) 
                VALUES (:id, :ten, :gia, :soluongton, :anh, :mota,  :iddm, :trangthai)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":ten", $ten);
        $stmt->bindParam(":gia", $gia);
        $stmt->bindParam(":soluongton", $soluongton);
        $stmt->bindParam(":anh", $anh);
        $stmt->bindParam(":mota", $mota);
        $stmt->bindParam(":iddm", $iddm);
        $stmt->bindParam(":trangthai", $trangthai);
        return $stmt->execute();
    }

    public function editProduct($id, $ten, $gia, $soluongton, $anh, $mota, $iddm, $trangthai)
    {
        $sql = "UPDATE sanpham 
                SET ten = :ten, gia = :gia, soluongton = :soluongton, anh = :anh, 
                    mota = :mota, iddm = :iddm, trangthai = :trangthai 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":ten", $ten);
        $stmt->bindParam(":gia", $gia);
        $stmt->bindParam(":soluongton", $soluongton);
        $stmt->bindParam(":anh", $anh);
        $stmt->bindParam(":mota", $mota);
        $stmt->bindParam(":iddm", $iddm);
        $stmt->bindParam(":trangthai", $trangthai);
        return $stmt->execute();
    }
    public function find_one_san_pham($id)
    {
        return $this->getProduct($id);
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM sanpham WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
