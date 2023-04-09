<div class="ql"><img class="iconql" src="./img_TMNN/catalog.png" />Quản lý loại hàng</div>
<hr>
<div class="title_mod"><img class="iconql" src="./img_TMNN/insert.png" />Thêm loại hàng</div>
<div class="content_mod">
    <form name="newloaihang" id="formadd_loaihang" method="post" 
    enctype="multipart/form-data" 
    action="./elements_TMNN/mLoaihang/loaihangAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên loại hàng: </td>
                <td><input type="text" name="tenloaihang" /></td>
            </tr>
            <tr>
                <td>Tên hình ảnh: </td>
                <td><input type="text" name="tenhinhanh" /></td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td><input type="file" name="fileimage" /></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr />
<?php
require './elements_TMNN/mod/loaihangCls.php';
?>
<div class="ql"><img class="iconql" src="./img_TMNN/list.png" />Danh sách loại hàng</div>
<div class="content_mod">
    <?php
    $obj = new loaihang();
    $list_loaihang = $obj->LoaihangGetAll();
    $l = count($list_loaihang);
    ?>
    <p>Trong bảng có: <b><?php echo $l; ?></b> loại hàng.</p>
    <?php
    if ($l > 0) {
    ?>
        <table class="tb" align="center">
            <thead>
                <tr align="center">
                    <th><img src="./img_TMNN/id.png" class="iconimg" /></th>
                    <th>Tên loại hàng</th>
                    <th><img src="./img_TMNN/nameimage.png" class="iconimg" /></th>
                    <th><img src="./img_TMNN/image.png" class="iconimg" /></th>
                    <th><img src="./img_TMNN/setting.png" class="iconimg" /></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_loaihang as $v) {
                ?>
                    <tr align="center">
                        <td ><?php echo $v->idloaihang; ?></td>
                        <td><?php echo $v->tenloaihang; ?></td>
                        <td><?php echo $v->tenhinhanh; ?></td>
                        <td ><img class="imgtable" src="data:image/png;base64,<?php echo ($v->hinhanh); ?>"/></td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./elements_TMNN/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $v->idloaihang; ?>">
                                    <img src="./img_TMNN/xóa.png" class="iconimg" />
                                </a>
                            <?php
                            } else {
                            ?>
                                <img src="./img_TMNN/xóa.png" class="iconimg" />
                            <?php
                            }
                            ?>
                            <temploaihang class="btnupdateloaihang" value="<?php echo $v->idloaihang; ?>">
                                <img class="iconimg" src="./img_TMNN/update.png" />
                            </temploaihang>
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
