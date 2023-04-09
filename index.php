<html>

<head>
    <meta charset="UTF-8">
    <title>SKHIN_TR.</title>
    <link type="text/css" rel="stylesheet" href="puplic_files/pmycss.css" />
    <link rel="shortcut icon" type="image/png" href="administrator/img_TMNN/market.png" />

</head>

<body>
    <div id="wrapper">
        <header>
            <div class="inner-header container">
                <a href="./index.php" id="logo">trangnon</a><img height="50px" src="administrator/img_TMNN/moon.png">
                <nav>
                    <ul id="main-menu">
                        <li><a href="./index.php">Trang chủ</a></li>
                        <li>
                            <div id="menusp"><a href="#">Sản phẩm</a></div>
                            <div id="menu">
                                <ul><?php require './apart/menuLoaihang.php'; ?></ul>
                            </div>
                        </li>
                        <li><a href="info/index.php">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div id="banner">

        </div>
        <div id="content" class="container">
            <h1>Best seller</h1>
            <div id="sp">
                <?php
                if (!isset($_GET['reqHanghoa'])) {
                    require './apart/viewListLoaiHang.php';
                } else {
                    require './apart/viewHangHoa.php';
                }
                ?>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="puplic_files/pjs.js" type="text/javascript"></script>
</body>

</html>