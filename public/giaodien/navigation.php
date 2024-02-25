<nav class="navbar navbar-expand-lg navbar-light menu ">
    <img src="images/Ilogo.png" class="navbar-brand img-fluid  ">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link " href="index.php" style="color: #fff">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="all_product.php">SẢN PHẨM</a>
            </li>
        </ul>
        <div class="nav-item icon ml-auto">
            <form action="search.php" method="post">
                <input class="search mt-2 mr-2" type="text" style="color: #333;" placeholder="Tìm Kiếm..." name="search_product">
                <button class="btn btn-outline-success my-2 my-sm-0 openBtn " type="submit" name="search_submit"><i class="fa fa-search  text-light"></i></button>
            </form>
        </div>
        <div class="nav-item icon " style="margin-right: 5px;" onclick="showCartContainer()">
            <a class="icon-button"><i class="fas fa-cart-plus"></i></a>
        </div>
    </div>
</nav>
<link rel="stylesheet" type="text/css" href="css/navigation.css">
<script src="../main.js"></script>