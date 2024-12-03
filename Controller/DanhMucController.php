<?php
class DanhMucController{
    //Hiển thị dữ liệu
    public function list() {
        //lấy dữ liệu danhmuc từ models
        $danhmuc = (new DanhMuc)-> all();
        //render view
        view("danhmuc/danhmuc", ['danhmuc' => $danhmuc]);
    }
    public function delete(){
        $id=$_GET['id'];
        (new DanhMuc)->delete($id);
        header("location: index.php");
        die;
    }
    public function add(){
      
        view("danhmuc/add");

    }
    public function store(){
        $data = $_POST;
        (new DanhMuc)->insert($data);
        header("location: index.php");
        die;
    }
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            //Cập nhật
            (new DanhMuc)->update($data);
        }
        $id = $_GET['id'];
        //lấy ra sách
        $danhmuc = (new DanhMuc)->find_one_danh_muc($id);
        //render view
        view("danhmuc/edit", ['danhmuc' => $danhmuc]);
    }
}