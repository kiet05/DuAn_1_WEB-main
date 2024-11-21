<?php
class DanhMucController{
    //Hiển thị dữ liệu
    public function list() {
        //lấy dữ liệu danhmuc từ models
        $danhmuc = (new DanhMuc)-> all();
        //render view
        view("danhmuc/danhmuc", ['danhmuc' => $danhmuc]);
    }
}