<?php
session_start();


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="images/Ilogo.png" type="image/png" />
  <title>Gear Tech</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="css/user.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>

<body>
  <div class="container-fluid  ">
    <?php require("db_connect.php") ?>
    <?php require("giaodien/header.php") ?>
    <?php require("giaodien/navigation.php") ?>
    <?php
        include("giaodien/cart.php");
        include("giaodien/deliveryInfor.php");
    ?>
    <?php
    if (!isset($_GET['quanly'])) {
      require("giaodien/slide_show.php");
    ?>

      <h2>Sản phẩm nổi bật</h2>
      <?php require("giaodien/product_top.php"); ?>

      <h2>Sản phẩm mới</h2>
    <?php require("giaodien/product_index.php");
    } else if ($_GET['quanly'] == 'user') {
      require("giaodien/user.php");
    }
    ?>

    <?php require("giaodien/footer.php") ?>
  </div>

  <style>
    h2 {
      text-align: center;
      padding: 30px;
      background-color: Orange;
    }
  </style>

  <script src="main.js"></script>
</body>

</html>