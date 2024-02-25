<?php
session_start();
include("db_connect.php");

header("Content-Security-Policy: script-src 'self'");

?>

<!DOCTYPE html>
<html>

<head>
  <title>Gear Tech</title>
  <link rel="icon" href="images/Ilogo.png" type="image/png" />
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="css/all_product.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
  <div class="container-fluid  ">
    <?php require("giaodien/header.php") ?>
    <?php require("giaodien/navigation.php") ?>
    <?php
        include("giaodien/cart.php");
        include("giaodien/deliveryInfor.php");
    ?>
    <section>
      <h2>Tất cả sản phẩm</h2>
      <div class="product-list">
        <?php
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
          echo "<div class='product-box'>";
          echo "<img src='images/product/" . $row['image'] . "' alt='Product Image' class='product-image'>";
          echo "<h3 class='product-title'>" . $row['tensp'] . "</h3>";
          echo "<p class='product-price'>Giá: " . number_format($row['price']) . " VND</p>";
          echo "<form action='product.php?id=" . $row['id'] . "' method='post'>
                        <input type='submit' value='Xem chi tiết' class='product-button'>
                    </form>";
          echo "</div>";
        }
        ?>
      </div>
    </section>
    <?php require("giaodien/footer.php") ?>
  </div>
  <script src="main.js"></script>
</body>

</html>