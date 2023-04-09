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
    <center><img class="imgViewHangHoa" src="data:image/png;base64,<?php echo ($obj->hinhanh); ?>"></center><br>
    <div class="mota"> 
        <b><?php echo $obj->tenhanghoa; ?></b><br>
    <b>Mô tả: </b><?php echo $obj->mota; ?><br>
    <b>Giá bán: </b><?php echo $obj->giathamkhao; ?> VNĐ<br><br></div>
    <center><button onclick="goBack()">Trở về</button></center>
</div>