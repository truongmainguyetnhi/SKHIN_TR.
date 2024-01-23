<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="content">
            <div id="video">
                <video height="500px" controls autoplay>
                    <source src="img_TMNN/qc.mp4" type="video/mp4"/> 
                </video>
            </div>
        </div>
        <hr>
        <div id="menu">
            No Ajax <br> 
            <a href="index.php?req=exjs03&page=page01">Page 01</a>
            <a href="index.php?req=exjs03&page=page02">Page 02</a>
            <a href="index.php?req=exjs03&page=page03">Page 03</a>
            <a href="index.php?req=exjs03&page=page04">Page 04</a>
            <hr>
            Use Ajax <br> 
            <b class="linkpage" value="page01">Page 01</b><br>
            <b class="linkpage" value="page02">Page 02</b><br>
            <b class="linkpage" value="page03">Page 03</b><br>
            <b class="linkpage" value="page04">Page 04</b><br>
            <hr>
        </div>
        <div id="getContent">
            <?php
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
                include './pageJS/' . $page . '.php';
            } else {
                echo "Nothing to show!";
            }
            ?>
            <hr>
        </div>
    </body>
</html>
