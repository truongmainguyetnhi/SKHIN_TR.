<?php 
    require './elements_TMNN/mod/loaihangCls.php';
    $obj = new loaihang();
    $list_loaihang = $obj -> LoaihangGetAll();
?>
<div class="ql"><img src="./img_TMNN/goods.png" class="iconql"/>Quản lý hàng hóa</div>
<hr>
<div class="title_mod"><img class="iconql" src="./img_TMNN/insert.png">Thêm hàng hóa</div>
<div class="content_mod">
    <form name="newhanghoa" id="formadd_hanghoa" method="post" 
    enctype="multipart/form-data" action="./elements_TMNN/mHanghoa/hanghoaAct.php?reqact=addnew">
    <table>
        <tr>
            <td>Tên loại hàng:</td>
            <td><input type="text" name="tenhanghoa"></td>
        </tr>
        <tr>
            <td>Mô tả:</td>
            <td><textarea name="mota" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Giá tham khảo:</td>
            <td><input type="number" name="giathamkhao"></td>
        </tr>
        <tr>
            <td>Tên hình ảnh:</td>
            <td><input type="text" name="tenhinhanh"></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td><input type="file" name="fileimage"></td>
        </tr>
        <tr>
            <td>Chọn loại hàng:</td>
            <td>
                <?php 
                    foreach($list_loaihang as $l){
                ?>
                <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang;?> ">
                <img height="30px" src="data:image/png;base64,<?php echo ($l->hinhanh);?>" >
                <?php echo ($l->tenloaihang);?><br>
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><input type="submit" id="btnsubmit" value="Tạo mới"></td>
            <td><input type="reset" value="Làm lại"><b id="noteForm"></b></td>
        </tr>
    </table>
</form>
</div>
<hr>
<div class="ql"><img class="iconql" src="./img_TMNN/list.png">Danh sách hàng hóa</div>
<div class="content_mod">
    <?php
    require './elements_TMNN/mod/hanghoaCls.php';
    $obj_hanghoa = new hanghoa();
    $list_hanghoa = $obj_hanghoa->HanghoaGetAll();
    $l = count($list_hanghoa);
    ?>
    <p>Trong bảng có: <b><?php echo $l;?></b> mặt hàng.</p>
    <?php
    if($l>0){
        ?>
        <table class="tb">
            <thead>
                <tr>
                    <th><img src="img_TMNN/id.png" class="iconimg" /></th>
                    <th>Tên hàng hóa</th>
                    <th><img src="img_TMNN/money.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/nameimage.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/image.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/setting.png" class="iconimg" /></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($list_hanghoa as $v){
                    ?>
                    <tr>
                        <td align="center"><?php echo $v->idhanghoa;?></td>
                        <td><?php echo $v->tenhanghoa;?></td>
                        <td><?php echo $v->giathamkhao;?></td>
                        <td><?php echo $v->tenhinhanh;?></td>
                        <td align="center"><img class="imgtable" src="data:image/png;base64,<?php echo ($v->hinhanh);
                                         ?>"/></td>                       
                        <td>
                        <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./elements_TMNN/mHanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->idhanghoa; ?>">
                                    <img src="./img_TMNN/xóa.png" class="iconimg" />
                                </a>
                            <?php
                            } else {
                            ?>
                                <img src="./img_TMNN/xóa.png" class="iconimg" />
                            <?php
                            }
                            ?>
                        <a href="index.php?req=hanghoaUpdate&idhanghoa=<?php echo $v->idhanghoa; ?>">
                        <img src="img_TMNN/update.png" class="iconimg" />  
                        </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
<hr>