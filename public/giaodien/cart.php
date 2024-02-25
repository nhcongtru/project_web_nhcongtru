<?php
$connect = new PDO("mysql:host=localhost;dbname=geartech", "root", "");

require("vendor/autoload.php");
$db_handle = new \controllers\dbcontroller();
if (!empty($_POST["cart"])) {
	switch ($_POST["cart"]) {
		case "add":
			if (!empty($_POST["quanlity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id='" . $_GET["id"] . "'");
				$MA_SP = $_GET["id"];
				$price = $productByCode[0]["price"];
				$itemArray = array($productByCode[0]["id"] => array('id' => $MA_SP, 'image' => $productByCode[0]["image"], 'name' => $productByCode[0]["tensp"], 'price' => $price, 'quanlity' => $_POST["quanlity"]));
				$check = 0;

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"]))) {
						$check = 1;
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode[0]["id"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quanlity"])) {
									$_SESSION["cart_item"][$k]["quanlity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quanlity"] += $_POST["quanlity"];
							}
						}
					} else {
						$_SESSION["cart_item"] += $itemArray;
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_POST["product"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
			break;
	}
}
$total_price = 0;
if (isset($_SESSION["cart_item"]))
	$total_price = 0;
?>
<script>
	function checkLogin() {
		var check = <?php
					if (isset($_SESSION['login'])) {
						if ($_SESSION['login'] == true) {
							if (isset($_SESSION["cart_item"]))
								echo 0;
							else
								echo 2;
						} else echo 1;
					} else echo 1;
					?>;
		switch (check) {
			case 0:
				document.getElementById("delInfor_container").style.display = "block";
				break;
			case 1:
				alert("Vui lòng đăng nhập");
				break;
			case 2:
				alert("Giỏ hàng rỗng");
				break;
		}
	}

	function hideCartContainer() {
		document.getElementById("cart_container").style.display = "none";
	}
</script>
<link rel="stylesheet" type="text/css" href="css/cart.css">
<div id="cart_container">
	<div class="XSign" id="XSign_cart" onclick="hideCartContainer()">x</div>
	<div id="titleCart">
		<div style="width:35%; float:left; text-align:center"><b>SẢN PHẨM</b></div>
		<div style="width:17.5%; float:left; text-align:center"><b>ĐƠN GIÁ</b></div>
		<div style="width:15%; float:left; text-align:center"><b>SỐ LƯỢNG</b></div>
		<div style="width:12.5%; float:left; text-align:center"><b>THÀNH TIỀN</b></div>
		<div style="width:15%; float:left"><b>THAO TÁC</b></div>
	</div>
	<div id="productCart">
		<?php
		if (isset($_SESSION["cart_item"]))
			foreach ($_SESSION["cart_item"] as $item) {
				$item_price = $item["quanlity"] * $item["price"];
				$total_price += $item_price;

		?>
			<div class="rowCart">
				<div class="colCart1">
					<div class="imgCart"><img src="images/product/<?php echo $item["image"]; ?>" /></div>
					<div class="nameCart"><?php echo $item["name"]; ?></div>
				</div>
				<div class="colCart3">
					<div style="margin-top:25px"><?php echo number_format($item["price"]); ?></div>
					<div>VNĐ</div>
				</div>
				<div class="colCart4"><?php echo $item["quanlity"]; ?></div>
				<div class="colCart5">
					<div style="margin-top:25px;"></div><?php echo number_format($item_price); ?><div>VNĐ</div>
				</div>
				<div class="colCart6">
					<form action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
						<input type="hidden" name="cart" value="remove">
						<input type="hidden" name="product" value="<?php echo $item["id"] ?>" />
						<button type="submit" class="removeP"><i class="fas fa-trash-alt"></i></button>
					</form>
				</div>
			</div>
		<?php
			}
		?>
	</div>
	<div id="footerCart" class="row">
		<div class="col-md-6 col-sm-6">
			<?php $total_pricef = number_format($total_price) ?>
			<div style="margin:0 1% 0 20%; float:left"><b>Tổng Đơn: <?php if ($total_price != "") echo "$total_pricef VNĐ";
																	else echo $total_price; ?></b></div>
			<div style="float:left" id="totalBill"></div>
		</div>
		<div class="col-md-6 col-sm-6">
			<button class="btn btn-ouline-success" onclick="checkLogin()">Đặt Hàng</button>
			<form id="cart_form" action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
				<input type="hidden" name="cart" value="empty">
				<button  type="submit" class="btn btn-ouline-warning">Làm Trống</button>
			</form>
		</div>
	</div>
	<br>

</div>
<script>
	if (<?php
		if (isset($_POST["cart"]) && $_POST["cart"] != "add")
			echo 1;
		else
			echo 0;
		?> == 1)
		document.getElementById("cart_container").style.display = "block";
	else
		document.getElementById("cart_container").style.display = "none";
</script>