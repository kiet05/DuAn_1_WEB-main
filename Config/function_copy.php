<?php
function connection(){
$host = "localhost";
$dbname = "duan1";
$username = "root";
$password = "";
$post = "3306";

try{
    $conn = new PDO("mysql:host=$host; dbname=$dbname; port=$post; charset=utf8", 
    $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (PDOException $e) {
    echo "Lỗi kết nối CSDL:" . $e->getMessage();
}
}

function view($view, $data=[]){
    extract($data);
    include_once "views/admin/$view.php";
}