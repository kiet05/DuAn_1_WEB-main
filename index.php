<?php
session_start();
require_once "./Controller/ProductController.php";
require_once "./Controller/DanhMucController.php";
require_once "./Model/DanhMuc.php";
require_once "./Model/Product.php";
require_once "./Config/function_copy.php";
// require_once "./Config/function.php";

$conn = connection();

$ctl = $_GET['ctl'] ?? "";

// match ($ctl) {
//     "" => (new DanhMucController)->list(),
//     "delete" => (new DanhMucController)->delete(),
//     "add" => (new DanhMucController)-> add(),
//     "store" => (new DanhMucController)->store(),
//     "edit" => (new DanhMucController) ->edit(),
 
//  };

match ($ctl) {
    "" => (new ProductController($conn))->list(),
    "add" => (new ProductController($conn))->add(),
    "store" => (new ProductController($conn))->store(),
    "edit" => (new ProductController($conn))->edit(),
    "delete" => (new ProductController($conn))->delete(),
    default => 'Không xác định',
};
?>

