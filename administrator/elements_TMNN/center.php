<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    if (isset($_GET['req'])) {
        $request = $_GET['req'];
        switch ($request) {
            case 'exjs01':
                require './pageJS/exjs01.php';
                break;
            case 'exjs02':
                require './pageJS/exjs02.php';
                break;
            case 'exjs03':
                require './pageJS/exjs03.php';
                break;
            case 'userview':
                require './elements_TMNN/mUser/userView.php';
                break;
            case 'updateuser':
                require './elements_TMNN/mUer/userUpdate.php';
                break;
            case 'loaihangView':
                require './elements_TMNN/mLoaihang/loaihangView.php';
                break;
            case 'hanghoaView':
                require './elements_TMNN/mHanghoa/hanghoaView.php';
                break;
            case 'hanghoaUpdate':
                require './elements_TMNN/mHanghoa/hanghoaUpdate.php';
                break;
            case 'login':
                require './elements_TMNN/mUser/userView.php';
                break;
        }
    } else {
        require './elements_TMNN/default.php';
    }
    ?>
</body>

</html>