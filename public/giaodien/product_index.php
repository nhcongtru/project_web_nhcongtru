<link rel="stylesheet" type="text/css" href="css/product_index.css">

<div class="product-list">
    <?php
    $stmt = $conn->prepare("SELECT * FROM bestseller");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo "<div class='product-box'>";
        echo "<img src='images/product/" . $row['image'] . "' alt='Product Image' class='product-image'>";
        echo "<h3 class='product-title'>" . $row['name'] . "</h3>";
        echo "<p class='product-price'>Giá: " . number_format($row['price']) . " VND</p>";
        echo "<form action='product.php?id=" . $row['id'] . "' method='post'>
                        <input type='submit' value='Xem chi tiết' class='product-button'>
                    </form>";
        echo "</div>";
    }
    ?>
</div>
<form action='all_product.php' method='post' class="d-flex justify-content-center align-items-center">
    <input type='submit' value='Xem Thêm' class='more-button'>
</form>