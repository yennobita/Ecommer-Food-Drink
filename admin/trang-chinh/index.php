<?php
require_once '../../global.php';
require '../../pdo.php';//sử dụng kết nối cơ sở dữ liệu PDO.
if (exist_param("hang-hoa")) { // kiểm tra xem một tham số cụ thể có tồn tại trong URL hay không
    $VIEW_NAME = "hang-hoa/index.php";
} else if (exist_param("loai-hang")) {
    $VIEW_NAME = "loai-hang/index.php";
} else if (exist_param("khach-hang")) {
    $VIEW_NAME = "khach-hang/index.php";
} else if (exist_param("binh-luan")) {
    $VIEW_NAME = "binh-luan/index.php";
} else if (exist_param("thong-ke")) {
    $VIEW_NAME = "thong-ke/index.php";
} else {
    $VIEW_NAME = "trang-chinh/home.php";
}
require '../layout.php';
