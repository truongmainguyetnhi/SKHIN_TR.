<div class="ql"><img src="./img_TMNN/catalog.png" class="iconql" /> Update loại hàng</div><hr>
    <?php
    require '../mod/loaihangCls.php';
    $idloaihang = $_GET['idloaihang'];
    $loaihang = new loaihang();
    $getloaihang = $loaihang->LoaihangGetbyId($idloaihang);
    ?>
    <div class="title_mod">
        <img src="./img_TMNN/update.png" class="iconql" /> Cập nhật loại hàng
    </div>
    <div class="content_mod">
        <form name="updateloaihang" id="formupdate" method="post" enctype="multipart/form-data" 
        action="./elements_TMNN/mLoaihang/loaihangAct.php?reqact=updateloaihang">
            <input type="hidden" name="idloaihang" value="<?php echo $idloaihang; ?>"/>
            <input type="hidden" name="hinhanh" value="<?php echo ($getloaihang->hinhanh); ?>"/>
            <table>
                <tr>
                    <td>Tên loại hàng:</td>
                    <td><input type="text" name="tenloaihang" value="<?php echo $getloaihang->tenloaihang; ?>"/></td>
                </tr>
                <tr>
                    <td>Tên hình ảnh:</td>
                    <td><input type="text" name="tenhinhanh" value="<?php echo $getloaihang->tenhinhanh; ?>"/></td>
                </tr>
                <tr>
                    <td>Hình ảnh:</td>
                    <td>
                        <input type="file" name="fileimage" />
                        <img class="imgtable" src="data:image/png;base64,<?php echo ($getloaihang->hinhanh); ?>"/>
                    </td>
                <tr>
                    <td><input type="submit" id="btnsubmit" value="Cập nhật" /></td>
                    <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
                </tr>
                </tr>
            </table>

        </form>
    </div>
