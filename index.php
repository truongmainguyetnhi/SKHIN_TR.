<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>SKHIN_TR.</title>
    <link type="text/css" rel="stylesheet" href="puplic_files/pmycss.css" />
    <link rel="shortcut icon" type="image/png" href="administrator/img_TMNN/market.png" />

</head>

<body>
    <?php
    if (!isset($_SESSION['USER']) and !isset($_SESSION['ADMIN'])) {
        header('location: administrator/userLogin.php');
    }
    ?>

    <div id="wrapper">
        <header>
            <div class="inner-header container">
                <a href="./index.php" id="logo">SKHIN_TR.</a>
                <?php if (isset($_SESSION['ADMIN'])) { ?>
                    <a href="administrator/index.php">
                        <img height="60px" src="administrator/img_TMNN/market.png"></a>
                <?php } else { ?>
                    <a href="./index.php">
                        <img height="60px" src="administrator/img_TMNN/market.png"></a> <?php } ?>
                <nav>
                    <ul id="main-menu">
                        <li>
                            <a href="./index.php">Trang chủ</a>
                        </li>
                        <li>
                            <div id="menusp"><a href="#">Sản phẩm</a></div>
                            <div id="menu">
                                <ul><?php require './apart/menuLoaihang.php'; ?></ul>
                            </div>
                        </li>
                        <li><a href="info/index.php">Liên hệ</a></li>
                        <li>
                            <div id="signoutbutton">
                                <a href="administrator/elements_TMNN/mUser/userAct.php?reqact=userlogout">
                                    <img src="administrator/img_TMNN/logout.png" height="30px" />
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="cart_icon"><img src="administrator/img_TMNN/cart.png" height="30px">
                                <sup> 0 </sup>
                            </div>
                        </li>

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
    <section class="cart">
        <img align="left" class="x" src="administrator/img_TMNN/x.png">
        <h2>Giỏ hàng</h2>
        <form action="">
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>SL</th>
                        <th>Chọn</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                </tbody>
            </table>
            <div class="price_total">
                <p>Tổng tiền: <span>0</span><sup>₫</sup></p>
            </div>
            <button style="width: 200px; height: 40px;">Thanh toán</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="puplic_files/pjs.js" type="text/javascript"></script>
</body>

</html>