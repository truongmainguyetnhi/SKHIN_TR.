<?php 
require './elements_TMNN/mod/hanghoaCls.php';
$idhanghoa = $_GET['idhanghoa'];
$hanghoa = new hanghoa();
$gethanghoa = $hanghoa->HanghoaGetbyId($idhanghoa);
require './elements_TMNN/mod/loaihangCls.php';
$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();
?>
<div class="ql"><img class="iconql" src="./img_TMNN/update.png">Cập nhật loại hàng</div><br>
<div class="content_mod">
    <form name="updatehanghoa" id="formupdate" method="post" enctype="multipart/form-data"
    action="./elements_TMNN/mHanghoa/hanghoaAct.php?reqact=updatehanghoa">
    <input type="hidden" name="idhanghoa" value="<?php echo $idhanghoa; ?>">
    <input type="hidden" name="hinhanh" value="<?php echo ($gethanghoa->hinhanh);?>">
    <table>
        <tr>
            <td>Tên Loại hàng:</td>
            <td><input type="text" name="tenhanghoa" value="<?php echo $gethanghoa->tenhanghoa; ?>"></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea name="mota" cols="30" rows="10"><?php echo $gethanghoa->mota; ?></textarea></td>
        </tr>
        <tr>
            <td>Giá tham khảo:</td>
            <td><input type="number" name="giathamkhao" value="<?php echo $gethanghoa->giathamkhao; ?>"></td>
        </tr>
        <tr>
            <td>Tên hình ảnh:</td>
            <td><input type="text" name="tenhinhanh" value="<?php echo $gethanghoa->tenhinhanh; ?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td>
                <input type="file" name="fileimage">
                <img class="imgtable" src="data:image/png;base64,<?php echo($gethanghoa->hinhanh); ?>">
            </td>
        </tr>
        <tr>
            <td>Chọn loại hàng:</td>
            <td><br>
                <?php 
                foreach($list_loaihang as $l){
                    ?>
                    <input type="radio" name="idloaihang" <?php if($l->idloaihang==$gethanghoa->idloaihang) 
                    echo "checked"; ?> value="<?php echo $l->idloaihang; ?>">
                    <img class="iconimg" src="data:image/png;base64,<?php echo ($l->hinhanh); ?>">
                    <?php echo ($l->tenloaihang);?><br>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><br><input type="submit" id="btnsubmit" value="Cập nhật"></td>
            <td><br><button onclick="window.location.reload();">Cancel</button><b id="noteForm"></b></td>
        </tr>
    </table>
</form>
</div>