<div class="ql"><img class="iconql" src="img_TMNN/qluser.png"> Quản lý người dùng</div>
<hr />
<div class="title_mod"><img class="iconql" src="./img_TMNN/newuser.png" />Người dùng mới</div>
<div>
    <form name="newuser" id="formreg" method="post" action="./elements_TMNN/mUser/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" /></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true" />
                    Nữ<input type="radio" name="gioitinh" value="0" />
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" /></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi" /></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="text" name="dienthoai" /></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td><input type="reset" id="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr />
<?php
require './elements_TMNN/mod/userCls.php';
?>
<div class="ql"><img class="iconql" src="img_TMNN/qluser.png"> Danh sách người dùng</div>
<div class="content_user">
    <?php
    $obj_User = new user();
    $list_User = $obj_User->UserGetAll();
    $l = count($list_User);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b> người dùng.</p>
    <?php
    if ($l > 0) {
    ?>
        <table class="tb">
            <thead>
                <tr>
                    <th><img src="img_TMNN/id.png" class="iconimg" /></th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ tên</th>
                    <th><img src="img_TMNN/gt.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/bd.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/location.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/phone.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/date.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/active.png" class="iconimg" /></th>
                    <th><img src="img_TMNN/setting.png" class="iconimg" /></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_User as $v) {
                ?>
                    <tr>
                        <td><?php echo $v->iduser; ?></td>
                        <td><?php echo $v->username; ?></td>
                        <td><?php echo $v->password; ?></td>
                        <td><?php echo $v->hoten; ?></td>
                        <td>
                            <?php
                            if ($v->gioitinh == 0) {
                            ?>
                                <img class="iconimg" src="./img_TMNN/girl.png">
                            <?php
                            } else {
                            ?>
                                <img class="iconimg" src="./img_TMNN/boy.png">
                            <?php
                            }
                            ?>
                        </td>
                        <td><?php echo $v->ngaysinh; ?></td>
                        <td><?php echo $v->diachi; ?></td>
                        <td><?php echo $v->dienthoai; ?></td>
                        <td><?php echo $v->ngaydangky; ?></td>
                        <td align="center">
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                if ($v->ability == 0) {
                            ?>
                                    <a href="./elements_TMNN/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?> 
                                    &ability=<?php echo $v->ability; ?>">
                                        <img class="iconimg" src="./img_TMNN/khóa.png" />
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="./elements_TMNN/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>
                                    &ability=<?php echo $v->ability; ?>">
                                        <img class="iconimg" src="./img_TMNN/mở.png" />
                                    </a>
                                <?php
                                }
                            } else {
                                if ($v->ability == 0) {
                                ?>
                                    <img class="iconimg" src="./img_TMNN/khóa.png" />
                                <?php
                                } else {
                                ?>
                                    <img class="iconimg" src="./img_TMNN/mở.png" />
                            <?php
                                }
                            }
                            ?>
                        </td>
                        <td align=center>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <a href="./elements_TMNN/mUser/userAct.php?reqact=deleteuser&iduser=<?php echo $v->iduser; ?>">
                                    <img class="iconimg" src="./img_TMNN/xóa.png">
                                </a>
                            <?php
                            } else {
                            ?>
                                <img class="iconimg" src="./img_TMNN/xóa.png">
                            <?php
                            }
                            ?>
                            <?php
                            //admin khong duoc update acc admin
                            if (isset($_SESSION['ADMIN'])) {
                            ?>
                                <img class="iconimg" src="./img_TMNN/update.png" />
                            <?php
                            } else if (isset($_SESSION['USER']) and $v->username == 'admin') {
                            ?>
                                <img class="iconimg" src="./img_TMNN/update.png" />
                            <?php
                            } else {
                            ?>
                                <temps class="btnupdate" value="<?php echo $v->iduser; ?>">
                                    <img class="iconimg" src="./img_TMNN/update.png" />
                                </temps>
                            <?php
                            }
                            ?>
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