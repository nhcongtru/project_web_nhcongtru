<?php
$checkPay = 0;
$conn = new PDO("mysql:host=localhost;dbname=geartech", "root", "");

require_once 'vendor/autoload.php';
$db_handle = new \controllers\dbcontroller();
if (isset($_SESSION['customer_name'])) {
	$username = $_SESSION['customer_name'];
	$inforUser = $db_handle->runQuery("SELECT MA_TK FROM taikhoan where TEN_DANG_NHAP='$username'");
	$idUser = $inforUser[0]["MA_TK"];
}
if (isset($_SESSION["cart_item"])) {
	$discount = array();
	foreach ($_SESSION["cart_item"] as $k => $v) {
		$getPrice = $db_handle->runQuery("SELECT price FROM products WHERE id=$k");
		$price = $getPrice[0]["price"];
		$total = $price;
	}
}
if (isset($_POST["delivery"])) {
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$dateBuy = date("Y-m-d h:i:s");
	$stmt = $conn->prepare("INSERT INTO hoadon(MA_TK, diachi, sdt, tongtien, ngaylap, tinhtrang)
		VALUES('" . $idUser . "', '" . $_POST["address_delInfor"] . "', '" . $_POST["phone_delInfor"] . "', '" . $total_price . "', '" . $dateBuy . "','0')");
	$stmt->execute();
	$getIDnew = $db_handle->runQuery("SELECT mahd FROM `hoadon` ORDER BY `hoadon`.`mahd` DESC");
	$IDnew = $getIDnew[0]["mahd"];
	foreach ($_SESSION["cart_item"] as $k => $v) {
		$getInventory = $db_handle->runQuery("SELECT soluong FROM products WHERE id='" . $_SESSION["cart_item"][$k]["id"] . "'");
		$inventory = $getInventory[0]["soluong"];
		$newQuanlity = $inventory - $_SESSION["cart_item"][$k]["quanlity"];
		$totalprice = $_SESSION["cart_item"][$k]["price"] * $_SESSION["cart_item"][$k]["quanlity"];
		$stmtct = $conn->prepare("INSERT INTO chitiethoadon(mahd, id, soluong, dongia)
			VALUES('" . $IDnew . "', '" . $k . "', '" . $_SESSION["cart_item"][$k]["quanlity"] . "', '" . $totalprice . "')");
		$stmtct->execute();
		$stmtup = $conn->prepare("UPDATE products SET soluong=$newQuanlity WHERE id='" . $_SESSION["cart_item"][$k]["id"] . "'");
		$stmtup->execute();
		$checkPay = true;
	}
	
}
?>
<link rel="stylesheet" type="text/css" href="css/deliveryInfor.css">
<script>
	function checkDelInfor() {
		var address, phone;
		address = document.getElementById("txAddress_delInfor").value;
		phone = document.getElementById("txPhone_delInfor").value;
		if (address == "") {
			alert("Vui lòng nhập địa chỉ");
			return 0;
		}
		if (phone == "") {
			alert("Vui lòng nhập số điện thoại");
			return 0;
		}
		var patt = /^\d+/;
		if (!phone.match(patt)) {
			alert("Số điện thoại không hợp lệ");
			return 0;
		}
		delInfor_form.submit();
		
	}

	function hideDelInfor() {
		document.getElementById("delInfor_container").style.display = "none";
	}
</script>
<div id="delInfor_container">
	<div id="delInfor_title">
		<div class="mr-2" id="delInfor_XSign" onclick="hideDelInfor()">X</div>
		<h5 style="color:white; line-height:50px">THÔNG TIN GIAO HÀNG</h5>
	</div>
	<div style="text-align:left; margin-left:30px">
		<form id="delInfor_form" action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="post">
			<input type="hidden" name="delivery" value="1">
			<div style="margin-top:20px"><b>Địa chỉ:</b></div>
			<input class="border-2" id="txAddress_delInfor" name="address_delInfor" type="text">
			<div style="margin-top:10px"><b>Số điện thoại:</b></div>
			<input class="border-2" id="txPhone_delInfor" name="phone_delInfor" type="text">
		</form>
	</div>
	<div style="margin-top:25px; text-align:center">
		<button id="btPay" onClick="checkDelInfor()">Thanh toán</button>
	</div>
</div>
<script>
	if (<?php echo "$checkPay" ?>){
		alert("Cảm ơn quý khách đã mua hàng");
		document.getElementById("cart_form").submit();
	}
		
</script>