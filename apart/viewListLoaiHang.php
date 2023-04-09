<?php
require './administrator/elements_TMNN/mod/hanghoaCls.php';
$hanghoa = new hanghoa();
if (isset($_GET['reqView'])) {
    $idloaihang = $_GET['reqView'];
    $list_hanghoa = $hanghoa->HanghoaGetbyIdloaihang($idloaihang);
    $s = count($list_hanghoa);
} else {
    $list_hanghoa = $hanghoa->HanghoaGetAll();
    $s = count($list_hanghoa);
}
?>
<div>
    <?php
    foreach ($list_hanghoa as $v) {
    ?>
        <a href="./index.php?reqHanghoa=<?php echo $v->idhanghoa; ?>">
            <div align="center" class="itemsHanghoa">
                <img class="imgHanghoa" src="data:image/png;base64,<?php echo ($v->hinhanh); ?>"><br>
                    <b><?php echo $v->tenhanghoa; ?></b><br>
            </div>
        </a>
    <?php
    }
    ?>
</div>