        <?php
        $s = '../../elements_TMNN/mod/database.php';
        if (file_exists($s)) {
            $f = $s;
        } else {
            $f = './elements_TMNN/mod/database.php';
        }
        require_once $f;

        class user extends Database
        {
            public function UserCheckLogin($username, $password)
            {
                $select = $this->connect->prepare(" SELECT * FROM user WHERE username = ? and password = ? and ability=1 ");
                $select->setFetchMode(PDO::FETCH_OBJ);
                $select->execute(array($username, $password));
                if (count($select->fetchAll()) == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            public function UserCheckUsername($username)
            {
                $select = $this->connect->prepare(" SELECT * FROM user WHERE username = ? ");
                $select->setFetchMode(PDO::FETCH_OBJ);
                $select->execute(array($username));
                if (count($select->fetchAll()) == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            public function UserGetAll()
            {
                $getAll = $this->connect->prepare(" SELECT * FROM user ");
                $getAll->setFetchMode(PDO::FETCH_OBJ);
                $getAll->execute();
                return $getAll->fetchAll();
            }

            public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai)
            {
                $add = $this->connect->prepare(" INSERT INTO user (username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai )
                         VALUES( ?, ?, ?, ?, ?, ?, ? ) ");
                $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));

                return $add->rowCount();
            }

            public function UserDelete($iduser)
            {
                $del = $this->connect->prepare("DELETE FROM user WHERE iduser = ? ");
                $del->execute(array($iduser));
                return $del->rowCount();
            }

            public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser)
            {
                $update = $this->connect->prepare(" UPDATE user SET "
                    . " username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? "
                    . " WHERE iduser = ? ");
                $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
                return $update->rowCount();
            }

            public function UserGetbyId($iduser)
            {
                $getTk = $this->connect->prepare(" SELECT * FROM user WHERE iduser = ? ");
                $getTk->setFetchMode(PDO::FETCH_OBJ);
                $getTk->execute(array($iduser));
                return $getTk->fetch();
            }

            public function UserSetPasswword($iduser, $password)
            {
                $update = $this->connect->prepare(" UPDATE user SET password = ? WHERE iduser = ? ");
                $update->execute(array($password, $iduser));
                return $update->rowCount();
            }

            public function UserSetActive($iduser, $ability)
            {
                $update = $this->connect->prepare("UPDATE user SET ability = ? WHERE iduser = ? ");
                $update->execute(array($ability, $iduser));
                return $update->rowCount();
            }

            public function UserChangePassword($username, $passwordold, $passwordnew)
            {
                $selectMK = $this->connect->prepare(" SELECT password FROM user WHERE username = ? ");
                $selectMK->setFetchMode(PDO::FETCH_OBJ);
                $selectMK->execute(array($username));
                if (count($selectMK->fetch()) == 1) {
                    $temp = $selectMK->fetch();
                    if ($passwordold == $temp->password) {
                        $update = $this->connect->prepare(" UPDATE user SET password = ? WHERE username = ? ");
                        $update->execute(array($passwordnew, $username));
                        return $update->rowCount();
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        }

        ?>
