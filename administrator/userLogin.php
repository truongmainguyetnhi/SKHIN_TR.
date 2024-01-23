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
    <div align="center" id="logincenter">
        <h4>ĐĂNG NHẬP HỆ THỐNG</h4>
        <form name="frmLogin" method="post" action="elements_TMNN/mUser/userAct.php?reqact=checklogin">
            <table class="father">
                <tr>
                    <td>Tên tài khoản: </td>
                    <td><input type="text" name="username" id="username" /></td>
                </tr>
                <tr>
                    <td>Mật khẩu: </td>
                    <td><input type="password" name="password" id="password" /></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
            </table>
            <input id="loginut" type="submit" value="Đăng nhập" />
        </form>
    </div>
</body>

</html>