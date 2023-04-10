<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ĐÂY LÀ WEBSITE CỦA NHI NHÁ</title>
    <link rel="stylesheet" href="stylecss_TMNN/mycss.css" type="text/css" />
    <link rel="shortcut icon" type="image/png" href="./img_TMNN/smile.png" />
</head>

<body>
    
    <div id="top_div">
        <?php require './elements_TMNN/top.php'; ?>
    </div>
    <div id="left_div">
        <?php require './elements_TMNN/left.php'; ?>
    </div>
    <div id="center_div">
        <?php require './elements_TMNN/center.php'; ?>
    </div>
    <div id="right_div">
        <?php require './elements_TMNN/right.php'; ?>
    </div>
    <div id="bottom_div"></div>
    <div id="signoutbutton">
        <a href="../index.php">
            <img src="img_TMNN/logout.png" height="50px" class="iconbutton" />
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" type="text/javascript"></script>
    <script src="js_TMNN/jscript.js" type="text/javascript"></script>
</body>

</html>