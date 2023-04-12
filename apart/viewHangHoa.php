<script>
    function goBack() {
        window.history.back();
    }
</script>
<?php
require './administrator/elements_TMNN/mod/hanghoaCls.php';
$hanghoa = new hanghoa();
if (isset($_GET['reqHanghoa'])) {
    $idhanghoa = $_GET['reqHanghoa'];
    $obj = $hanghoa->HanghoaGetbyId($idhanghoa);
}
?>
<div class="itemsViewHangHoa">
    <img class="imgViewHangHoa" src="data:image/png;base64,<?php echo ($obj->hinhanh); ?>"><br>
    <div class="mota">
        <h1><?php echo $obj->tenhanghoa; ?></h1>
        <p><b>Mô tả: </b><?php echo $obj->mota; ?></p>
        <p id="giathamkhao"><span><?php echo $obj->giathamkhao; ?></span><sup>₫</sup></p>
    </div>
    <button class="gio">Thêm vào giỏ hàng</button>
</div>