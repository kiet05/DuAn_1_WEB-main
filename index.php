<?php
session_start();
// require_once "./Config/function.php";
// require_once "./Config/env.php";
require_once "./Config/function_copy.php";

require_once "./Controller/DanhMucController.php";

require_once "./Model/DanhMuc.php";

$ctl = $_GET['ctl'] ?? "";


match ($ctl) {
   "" => (new DanhMucController)->list(),

};
