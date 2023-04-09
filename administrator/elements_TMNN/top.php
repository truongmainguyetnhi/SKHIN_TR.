<div class="top_ql" align="center">
    <?php
    if (isset($_SESSION['USER'])) {
        $namelogin = $_SESSION['USER'];
    }
    if (isset($_SESSION['ADMIN'])) {
        $namelogin = $_SESSION['ADMIN'];
    }
    if (isset($_COOKIE[$namelogin])) {
        echo "Xin chào " . $namelogin . " đến với trang quản trị." . "<br><br>";
        echo "Lần đăng nhập gần nhất: " . $_COOKIE[$namelogin];
    }
    ?>
</div>