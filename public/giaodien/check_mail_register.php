<?php

function checkmail()
{
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        include("../db_connect.php");

        $checkemail = "SELECT * FROM taikhoan WHERE EMAIL=:email";
        $stmt = $conn->prepare($checkemail);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
            echo 1;
            exit();
        } else {
            echo 0;
            exit();
        }

        $conn = null;
    }
}

checkmail();
?>