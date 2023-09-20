<?php

session_start();// cho phép duy trì trạng thái và truyền thông tin giữa các trang.
/*
* Định nghĩa các url cần thiết được sử dụng trong website
*/
$ROOT_URL = "Food And Drink";
$CONTENT_URL = "../../content";
$ADMIN_URL = "$ROOT_URL/admin";
$SITE_URL = "$ROOT_URL/site";
/*
* Định nghĩa đường dẫn chứa ảnh sử dụng trong upload
*/
$IMAGE_DIR = "../../content/images";
/*
* 2 biến toàn cục cần thiết để chia sẻ giữa controller và view
*/
$VIEW_NAME = "index.php";
$MESSAGE = "";

/**
 * Kiểm tra sự tồn tại của một tham số trong request
 * @param string $fieldname là tên tham số cần kiểm tra
 * @return boolean true tồn tại
 */
function exist_param($fieldname)//  kiểm tra xem một tham số nào đó có tồn tại trong yêu cầu (request) không.
{
    return array_key_exists($fieldname, $_REQUEST);
}
/**
 * Lưu file upload vào thư mục
 * @param string $fieldname là tên trường file
 * @param string $target_dir thư mục lưu file
 * @return tên file upload
 */
function save_file($fieldname, $target_dir)///lưu tệp tải lên vào file upload
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}
/**
 * Tạo cookie
 * @param string $name là tên cookie
 * @param string $value là giá trị cookie
 * @param int $day là số ngày tồn tại cookie
 */
function add_cookie($name, $value, $day)//tạo 1 cookie
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}
/**
 * Xóa cookie
 * @param string $name là tên cookie
 */
function delete_cookie($name) //xóa một cookie bằng cách gọi lại hàm add_cookie() với giá trị trống và số ngày là -1.
{
    add_cookie(
        $name,
        "",
        -1
    );
}
/**
 * Đọc giá trị cookie
 * @param string $name là tên cookie
 * @return string giá trị của cookie
 */
function get_cookie($name) // đọc giá trị của một cookie
{
    return $_COOKIE[$name] ?? '';
}
/**
 * Kiểm tra đăng nhập và vai trò sử dụng.
 * Các php trong admin hoặc php yêu cầu phải được đăng nhập mới được
 * phép sử dụng thì cần thiết phải gọi hàm này trước
 **/
function check_login() //kiểm tra đăng nhập và vai trò sử dụng
{
    global $SITE_URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
            return;
        }
    }
    header("location: $SITE_URL/tai-khoan/dang-nhap.php");
    $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
}
