<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="../images/Ilogo.png" type="image/png" />
	<title>Gear Tech</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
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
		<a href="javascript:history.back()" class="back-button">Quay lại</a>
		<?php
		include("db_connect.php");
		if (isset($_POST['search_submit'])) {
			$tukhoa = $_POST['search_product'];
			$stmt = $conn->prepare("SELECT * from products WHERE tensp LIKE '%$tukhoa%' GROUP BY tensp ORDER BY price ASC");
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		$img = "";
		$title_result = "";
		if ($result == null) {
			$img = "images/no-result.png";
			$title_result = "KHÔNG TÌM THẤY SẢN PHẨM  ";
		}
		?>
		<script>
			$tukhoa = escapeHtml($tukhoa)

			function getresult(url) {
				$.ajax({
					url: url,
					type: "GET",
					data: {
						rowcount: $("#rowcount").val()
					},
					success: function(data) {
						$("#pagination-result").html(data);
					}
				});
			}
		</script>
		<div class="ads-grid py-sm-5 py-4 all-product ">
			<div class="title_search ">
				<span class="keyword_search">TÌM KIẾM THEO TỪ KHOÁ: <strong><?php echo htmlspecialchars($tukhoa, ENT_QUOTES, 'UTF-8') ?></strong></span>
			</div>
			<h1 class="no_result_search"><?php echo $title_result ?> </h1>
			<div class="product-list ">
				<?php
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
		</div>
		<?php require("giaodien/footer.php") ?>
	</div>
</body>