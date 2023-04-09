<?php
require './administrator/elements_TMNN/mod/loaihangCls.php';
?>
<?php
$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();
foreach ($list_loaihang as $v) {
?>
    <a href="./index.php?reqView=<?php echo $v->idloaihang; ?>">
        <div align=center class="itemsmenu">
            <img class="imgmenu" src="data:image/png;base64,<?php echo ($v->hinhanh); ?>">
            <?php echo ($v->tenloaihang); ?>
        </div>
    </a>
<?php
}
?>