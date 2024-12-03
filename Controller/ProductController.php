<?php
class ProductController
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function list()
    {
        try {
            $productModel = new Product($this->db);
            $sanpham = $productModel->getAllProducts();
            view("sanpham/sanpham", ['sanpham' => $sanpham]);
        } catch (Exception $e) {
            die("Lỗi khi lấy danh sách sản phẩm: " . $e->getMessage());
        }
    }

    public function add()
    {
        $danhmuc = (new DanhMuc)->all();
        view('sanpham/product_add', ['danhmuc' => $danhmuc]);
    }

    public function store()
    {
        if (empty($_POST['id']) || empty($_POST['ten']) || empty($_POST['gia']) || empty($_POST['soluongton']) || empty($_POST['mota']) || empty($_POST['iddm']) || !isset($_POST['trangthai'])) {
            die("Dữ liệu không hợp lệ. Vui lòng kiểm tra các trường nhập liệu.");
        }
        $data = $_POST;
        $anh = "";
        $file_anh = $_FILES['anh'];
            if ($file_anh['size'] > 0) {
                $anh = "images/" . $file_anh["name"];
                move_uploaded_file($file_anh["tmp_name"], $anh);
            }
        $data['anh'] = $anh;
        (new Product($this->db))->addProduct($data['id'], $data['ten'], $data['gia'], $data['soluongton'], $anh, $data['mota'], $data['iddm'], $data['trangthai']);
        header("location: index.php");
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $file_anh = $_FILES['anh'];
            if ($file_anh['size'] > 0) {
                $anh = "images/" . $file_anh["name"];
                move_uploaded_file($file_anh["tmp_name"], $anh);
                $data['anh'] = $anh;
            }
            //Cập nhật
            (new Product($this->db))->editProduct($data['id'], $data['ten'], $data['gia'], $data['soluongton'], $data['anh'], $data['mota'], $data['iddm'], $data['trangthai']);
            header("location: index.php");
        }
        $danhmuc = (new DanhMuc)->all();
        $id = $_GET['id'];
        //lấy ra sách
        $sanpham = (new Product($this->db))->find_one_san_pham($id);
        //render view
        view("sanpham/product_edit", ['danhmuc' => $danhmuc, 'sanpham' => $sanpham]);
    }

    public function delete()
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
        if (!$id) {
            die("Không thể xóa sản phẩm với ID $id.");
            return;
        }

        try {
            $productModel = new Product($this->db);
            $productModel->deleteProduct($id);
            header("location: index.php?ctl=");
        } catch (Exception $e) {
            die("Lỗi khi xóa sản phẩm: " . $e->getMessage());
        }
    }
}
