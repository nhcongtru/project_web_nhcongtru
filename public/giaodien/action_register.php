<?php
session_start();

function register()
{
    if (!empty($_POST)) {
        $usernamer = $_POST['username'];
        $passwordr = $_POST['password'];
        $email = $_POST['email'];
        require("../db_connect.php");

        // Thực hiện truy vấn kiểm tra email
        $checkemail = $conn->prepare("SELECT * FROM taikhoan WHERE EMAIL = :email");
        $checkemail->bindParam(':email', $email);
        $checkemail->execute();
        $data = $checkemail->fetchAll(PDO::FETCH_ASSOC);

        // Nếu không có dữ liệu, thêm tài khoản mới
        if (empty($data)) {
            // md5 mật khẩu
            $passwordr = md5($passwordr);

            // Thực hiện truy vấn INSERT
            $stmt = $conn->prepare("INSERT INTO taikhoan (TEN_DANG_NHAP, MAT_KHAU, EMAIL, STATUS) VALUES (:username, :password, :email, '1')");
            $stmt->bindParam(':username', $usernamer);
            $stmt->bindParam(':password', $passwordr); // Sử dụng mật khẩu đã được hash
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            echo 1;
            exit();
        } else {
            // Email đã tồn tại
            echo 0;
            exit();
        }
    }
}

register();
