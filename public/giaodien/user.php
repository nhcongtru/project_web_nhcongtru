<?php
require("db_connect.php");
$name = $_SESSION['customer_name'];
$query1 = "SELECT * FROM taikhoan WHERE TEN_DANG_NHAP = :name";
$stmt = $conn->prepare($query1);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->execute();

$row_customer = $stmt->fetch(PDO::FETCH_ASSOC);
$id_customer = $row_customer['MA_TK'];

$getHD = "SELECT * FROM hoadon WHERE MA_TK='$id_customer'";
$stmthd = $conn->prepare($getHD);
$stmthd->execute();
$resultHD = $stmthd->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="user-content row">
	<div class="side-menu col-md-3 sol-sm-12">
		<div class="username ">
			<i class="far fa-user-circle font "></i>
			Tài khoản của <br> <span class="font " style="padding-left: 22%;"><?php echo $row_customer['TEN_DANG_NHAP']  ?></span>
		</div>
	</div>
	<div class="information col-md-9 sol-sm-12">
		<div class="information-user">
			<h5 class="font title-infor">THÔNG TIN CỦA TÔI </h5>
			<p class="font"><span class="font title-infor">Họ Và Tên:</span> <?php echo $row_customer['TEN_DANG_NHAP']  ?></p>
			<p class="font"><span class="font title-infor ">Email:</span> <?php echo $row_customer['EMAIL']  ?></p>
			<p class="font"><span class="font title-infor">Điện Thoại:</span> <?php echo $row_customer['PHONE']  ?></p>
			<p class="font"><span class="font title-infor">Địa Chỉ:</span> <?php echo $row_customer['DIA_CHI']  ?></p>
		</div>
		<br>
	</div>

	<div class="container-fluid table-order">
		<br>
		<div class="table-responsive-md bangcacdondat" id="donhang">
			<p class="font cacdonhang">Các Đơn Hàng Đã Đặt:</p>
			<table class="table table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th class="tr">Mã Đơn Hàng</th>
						<th class="tr">Ngày Đặt</th>
						<th class="tr">Tên Sản Phẩm</th>
						<th class="tr">Tổng Tiền</th>
						<th class="tr" style="width: 10%;">Trạng Thái Đơn Hàng</th>
						<th class="tr">Thao Tác</th>
					</tr>
				</thead>

				<?php
				$huy = "";
				$getIDhuy = "";
				$id_huy = "";
				foreach ($resultHD as $row_hoadon) {
					$MA_HD = $row_hoadon['mahd'];
					$NGAY_DAT = $row_hoadon['ngaylap'];
					$TIEN = $row_hoadon['tongtien'];
					$TRANG_THAI = "Chưa Xử Lý";
					if ($row_hoadon['tinhtrang'] == 0) $TRANG_THAI = "Đang Xử Lý";
					else if ($row_hoadon['tinhtrang'] == 1) $TRANG_THAI = "Đã Hoàn Thành";
					if ($row_hoadon['tinhtrang'] == -1) {
						$huy = '<button  type="button" class="btn btn-danger">
                        <a style="color:#000" href="index.php?quanly=user&delete_id_order=';
						$getIDhuy = '">Huỷ</a></button>';
						$id_huy = $MA_HD;
						if (isset($_GET['delete_id_order'])) {
							$MA_HD_DELETE = $_GET['delete_id_order'];

							$deleteCTHD = "DELETE FROM `chitiethoadon` WHERE mahd='$MA_HD_DELETE'";
							$stmtcthd = $conn->prepare($deleteCTHD);
							$stmtcthd->execute();

							$deleteHD = "DELETE FROM `hoadon` WHERE mahd='$MA_HD_DELETE'";
							$stmthd = $conn->prepare($deleteHD);
							$stmthd->execute();
						}
					}
				?>
					<script>
						console.log(<?php echo $MA_HD ?>)
					</script>
					<tr>
						<td class="items id_order"><a><?php echo $MA_HD ?> </td>
						<td class="items"><?php echo $NGAY_DAT ?></td>
						<td class="items name-product">
							<?php
							$stmt = $conn->prepare("SELECT p.id, p.tensp, SUM(od.soluong) AS TotalQuantity, p.price FROM products AS p INNER JOIN chitiethoadon AS od ON p.id = od.id WHERE od.mahd = :ma_hd GROUP BY p.id ORDER BY SUM(od.soluong)");
							$stmt->bindParam(':ma_hd', $MA_HD);
							$stmt->execute();
							foreach ($stmt as $row_TEN_SP) {
								$TEN_SP = $row_TEN_SP['tensp'];
								$ID_SP = $row_TEN_SP['id'];
								$SL = $row_TEN_SP['TotalQuantity'];
							?>
								<a class="name_product_content" href="product.php?id=<?php echo $ID_SP ?>">
									<?php echo " $TEN_SP ---- Số Lượng: $SL  </br> " ?>
								</a>
							<?php
							}
							?>
						</td>
						<td class="items"><?php echo number_format($TIEN) ?> VNĐ</td>
						<td class="items"><?php echo $TRANG_THAI ?></td>
						<td class="items">
							<?php echo "$huy$id_huy$getIDhuy" ?>
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>