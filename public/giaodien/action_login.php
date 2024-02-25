<?php
session_start();

function login()
{
    if (!empty($_POST) && isset($_POST)) {
        $passwordl = $_POST['password'];
        $email = $_POST['email'];
        $passwordl = md5($passwordl);
        require("../db_connect.php");

        // Thực hiện truy vấn dữ liệu
        $stmt = $conn->prepare("SELECT EMAIL, MAT_KHAU, TEN_DANG_NHAP FROM taikhoan WHERE EMAIL = :email AND MAT_KHAU = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordl);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Lấy Tên Người Dùng
        $usernamel = "";
        foreach ($result as $row) {
            $usernamel = $row['TEN_DANG_NHAP'];
        }

        // Đóng kết nối
        $conn = null;

        if ($result != null && count($result) > 0) {
            $_SESSION['customer_name'] = $usernamel;
            $_SESSION['login'] = true;
            echo 1;
            exit();
        } else {
            echo 0;
            exit();
            $_SESSION['login'] = false;
        }
    }
}

login();
