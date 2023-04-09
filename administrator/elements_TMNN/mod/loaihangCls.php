<?php
        $s = 'database.php';
        if (file_exists($s)) {
            $f = $s;
        } else {
            $f = 'database.php';
        }
        require_once $f;
        class loaihang extends Database {
            public function LoaihangGetAll() {
                $getAll = $this -> connect -> prepare(" SELECT * FROM loaihang ");
                $getAll -> setFetchMode( PDO::FETCH_OBJ );
                $getAll -> execute();
                return $getAll -> fetchAll();
            }

            public function LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh ) {
                $add = $this -> connect -> prepare(" INSERT INTO loaihang (tenloaihang, tenhinhanh, hinhanh )
                         VALUES( ?, ?, ? )");
                $add -> execute (array( $tenloaihang, $tenhinhanh, $hinhanh ));

                return $add -> rowCount();
            }
            public function LoaihangDelete( $idloaihang) {
                $del = $this -> connect-> prepare("DELETE FROM loaihang WHERE idloaihang = ? ");
                $del -> execute(array($idloaihang));
                return $del -> rowCount();
            }

            public function LoaihangUpdate( $tenloaihang, $tenhinhanh, $hinhanh, $idloaihang) {
                $update = $this -> connect -> prepare("UPDATE loaihang SET tenloaihang = ?, tenhinhanh = ?, hinhanh = ? WHERE idloaihang = ? ");
                $update -> execute(array ($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang ));
                return $update -> rowCount();
            }

            public function LoaihangGetbyId( $idloaihang) {
                $getTk = $this -> connect -> prepare(" SELECT * FROM loaihang WHERE idloaihang = ? ");
                $getTk -> setFetchMode( PDO::FETCH_OBJ);
                $getTk -> execute(array($idloaihang));
                return $getTk -> fetch();
            }

        }
        ?>
