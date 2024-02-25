<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Gear Tech</title>
    <link rel="icon" href="images/Ilogo.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid  ">
        <?php
        include("giaodien/cart.php");
        include("giaodien/deliveryInfor.php");
        ?>
        <?php require("giaodien/header.php") ?>
        <?php require("giaodien/navigation.php") ?>
    </div>

    <?php
    // Kết nối cơ sở dữ liệu
    require_once 'db_connect.php';
    $product_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = $product_id");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $result[0];
    ?>

    <?php
    $sum = $row['soluong'];
    if ($sum > 0) {
        $checksoluong = "Còn Hàng";
        $notification = "";
        $disableQuanlity = "";
        $disable = "";
    } else {
        $checksoluong = "Hết Hàng";
        $disable = "disabled";
        $notification = "Sản Phẩm Đã Hết! Xin Quý Khách Vui Lòng Chọn Sản Phẩm Khác !";
        $disableQuanlity = "disabled";
    }
    ?>

    <div class="detail">
        <div style="margin: 30px 0;" class="row chitiet">
            <div class="col-md-6 col-sm-12 images pr-5">
                <div class="wrap pr-5">
                    <img id="myImgDetail" class="item img-fluid" src="images/product/<?php echo $row['image'] ?>" id="img-product-detail">
                </div>
            </div>
            <div class="col-md-6 col-sm-12" style="padding-right: 6ex;">
                <div class="text-center titleproduct"><?php echo $row['tensp'] ?></div>
                <div class="price-chitiet">
                    <span>Giá bán:</span>
                    <strong style="color: red;font-size: 29px"> <?php echo number_format($row['price']); ?> VNĐ</strong>
                </div>
                <div class="possibility-chitiet">
                    <span style="color: #5F4C0B;font-weight: bold;">Tình trạng:</span>
                    <strong class="warn"><?php echo $checksoluong ?></strong>( Còn: <?php echo $sum ?> sản phẩm )
                </div>
                <hr style="border: 2ex solid rgb(19, 17, 17); margin: 2ex 3px;">
                <div class="details">
                    <span style="text-decoration: underline;">Điểm nổi bật</span>
                    <p> <?php echo $row['description'] ?> </p>
                </div>
                <form id="detailForm" action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
                    <input type="hidden" name="cart" value="add" />
                    <div class="qty-chitiet">
                        <label class="qty-name font-weight-bold">SỐ LƯỢNG: </label>
                        <div class="buttons_added">
                            <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="minus is-form" type="button" value="-" onclick="adjustQuanlity(this)">
                            <input <?php echo $disableQuanlity; ?> aria-label="quantity" id="txQuanlity_detail" class="input-qty" min="1" name="quanlity" type="number" value=1 onchange="validateQuanlity(this)">
                            <input <?php echo $disableQuanlity; ?> style="cursor: pointer;" class="plus is-form" type="button" value="+" onclick="adjustQuanlity(this)">
                        </div>
                    </div>

                    <div class=" button-chitiet row">
                        <button type="button" <?php echo $disable ?> id="btAddCart" class="btn btn-outline-primary col-md-4  col-sm-12" value="add" style="float: left;" onclick="checkQuanlity()"><a style="    font-weight: bold;text-decoration: none;color: #3B0B39"> Thêm Vào Giỏ Hàng</a> </button>
                    </div>
                </form>
                <span class="sold-out"><?php echo $notification ?> </span>
                </br></br>
            </div>
        </div>
    </div>

    <?php require("giaodien/footer.php") ?>

    <script>
        function adjustQuanlity(obj) {
            var op = obj.value;
            var MAX = <?php echo $row['soluong']; ?>;
            var txQuanlity = document.getElementById("txQuanlity_detail");
            if (op == '+') {
                if (txQuanlity.value < MAX)
                    txQuanlity.value++;
                else
                    alert("Số lượng đã đạt tối đa");
            } else
            if (txQuanlity.value > 0)
                txQuanlity.value--;
            if (document.getElementById("txQuanlity_detail").value == 0)
                document.getElementById("btAddCart").disabled = "disabled";
            else
                document.getElementById("btAddCart").disabled = "";
        }

        function validateQuanlity(obj) {
            var MAX = <?php echo $row['soluong']; ?>;
            if (obj.value > MAX) {
                alert("chỉ còn " + MAX + " sản phẩm");
                obj.value = MAX;
            }
            if (obj.value < 0)
                obj.value = 0;
            if (obj.value == "")
                obj.value = 0;
            if (MAX == 0)
                obj.value = 0;
            if (document.getElementById("txQuanlity_detail").value == 0)
                document.getElementById("btAddCart").disabled = "disabled";
            else
                document.getElementById("btAddCart").disabled = "";
        }

        function checkQuanlity() {
            var quanlityInput = document.getElementById("txQuanlity_detail").value;
            var MAX = <?php echo $row['soluong']; ?>;
            if (quanlityInput > MAX) {
                alert("chỉ còn " + MAX + " sản phẩm");
                return 0;
            }

            detailForm.submit();
        }
        if (document.getElementById("txQuanlity_detail").value == 0)
            document.getElementById("btAddCart").disabled = "disabled";
        else
            document.getElementById("btAddCart").disabled = "";
    </script>
    <script src="main.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/slide.js"></script>
    <script src="main.js"></script>
</body>

</html>