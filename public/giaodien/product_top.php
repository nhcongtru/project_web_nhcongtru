<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/product_top.css">
</head>

<body>
    <div class="slider-container">
        <div class="slider">
            <?php
            $stmt = $conn->prepare("SELECT * FROM bestseller");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                echo "<div class='product'>";
                echo "<h3 class='product-title'>" . $row['name'] . "</h3>";
                echo "<p class='product-price'>Giá: " . number_format($row['price']) . " VND</p>";
                echo "<img src='images/product/" . $row['image'] . "' class='product-img'>";
                echo "  <form action='product.php?id=" . $row['id'] . "' method='post'>
                                <input class='product-button' type='submit' value='Xem chi tiết'>
                            </form>";
                echo "</div>";
            }
            ?>
            <form action='all_product.php' method='post' class="d-flex justify-content-center align-items-center">
                <input type='submit' value='Xem Thêm' class="more-button">
            </form>
        </div>
        <div class="arrow arrow-left">&lt;</div>
        <div class="arrow arrow-right">&gt;</div>

    </div>
    <script>
        const slider = document.querySelector('.slider');
        const arrowLeft = document.querySelector('.arrow-left');
        const arrowRight = document.querySelector('.arrow-right');
        const productWidth = document.querySelector('.product').offsetWidth;
        let currentPosition = 0;

        arrowLeft.addEventListener('click', () => {
            if (currentPosition > 0) {
                currentPosition -= productWidth + 20;
            } else {
                currentPosition = slider.scrollWidth - slider.offsetWidth;
            }
            slider.style.transform = `translateX(-${currentPosition}px)`;
        });

        arrowRight.addEventListener('click', () => {
            const sliderWidth = slider.offsetWidth;
            const maxPosition = slider.scrollWidth - sliderWidth;

            if (currentPosition < maxPosition) {
                currentPosition += productWidth + 20;
            } else {
                currentPosition = 0;
            }
            slider.style.transform = `translateX(-${currentPosition}px)`;
        });
    </script>
</body>

</html>