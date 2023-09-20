<?php

// Mở kết nối 
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//sử dụng để thiết lập chế độ báo lỗi (ERRMODE_EXCEPTION) để quản lý các lỗi khi thực thi truy vấn
    return $conn;
}


// Thực thi câu lệnh INSERT, UPDATE, DELETE
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);//lấy mảng tất cả các tham số được truyền vào hàm.
    try {
        $conn = pdo_get_connection();//gọi thiết lập một kết nối với cơ sở dữ liệu
        $stmt = $conn->prepare($sql);//
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn nhiều bản ghi
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn 1 bản ghi
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn 1 giá trị
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function runSQL($sql)
{
    $db = pdo_get_connection();
    $result = $db->prepare($sql);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
?>