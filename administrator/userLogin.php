<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login SKHIN_TR.</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="js_TMNN/jscript.js"></script>
    <link rel="stylesheet" href="stylecss_TMNN/mycss.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="./img_TMNN/market.png" />

</head>

<body class="loginbody">
    <div id="logincenter">
        <form class="form_box" name="frmLogin" method="post" action="elements_TMNN/mUser/userAct.php?reqact=checklogin">
            <h1>Sign in</h1>
            <div class="input_box">
                <input type="text" name="username" id="username">
                <label>Tên tài khoản</label>
            </div>
            <div class="input_box">
                <input type="password" name="password" id="password">
                <label>Mật khẩu</label>
            </div>
            <button type="submit" class="btnut">Đăng nhập</button>
        </form>
    </div>
</body>

</html>