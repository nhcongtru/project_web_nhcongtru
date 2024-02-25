<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "geartech";
    
    try {
        // Tạo kết nối đến cơ sở dữ liệu
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
        // Thiết lập chế độ báo lỗi và chế độ chế độ nhận kết quả ở dạng mảng kết hợp
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
    }
?>
