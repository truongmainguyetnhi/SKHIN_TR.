<?php
        $s = 'database.php';
        if (file_exists($s)) {
            $f = $s;
        } else {
            $f = 'database.php';
        }
        require_once $f;
class hanghoa extends Database{
    public function HanghoaGetAll() {
        $getAll = $this -> connect -> prepare(" SELECT * FROM hanghoa ");
        $getAll -> setFetchMode( PDO::FETCH_OBJ );
        $getAll -> execute();
        return $getAll -> fetchAll();
    }

    public function HanghoaAdd( $tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang ) {
        $add = $this -> connect -> prepare(" INSERT INTO hanghoa (tenhanghoa, mota, giathamkhao, tenhinhanh, hinhanh, idloaihang )
                 VALUES( ?, ?, ?, ?, ?, ? ) ");
        $add -> execute (array( $tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang ));

        return $add -> rowCount();
    }

    public function HanghoaDelete( $idhanghoa) {
        $del = $this -> connect-> prepare("DELETE FROM hanghoa WHERE idhanghoa = ? ");
        $del -> execute( array( $idhanghoa));
        return $del -> rowCount();
    }

    public function HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa) {
        $update = $this -> connect -> prepare(" UPDATE hanghoa SET "
                . " tenhanghoa = ?, mota = ?, giathamkhao = ?, tenhinhanh = ?, hinhanh = ?, idloaihang = ? "
                . " WHERE idhanghoa = ? ");
        $update -> execute(array ($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa));
        return $update -> rowCount();
    }

    public function HanghoaGetbyId( $idhanghoa) {
        $getTk = $this -> connect -> prepare(" SELECT * FROM hanghoa WHERE idhanghoa = ? ");
        $getTk -> setFetchMode( PDO::FETCH_OBJ);
        $getTk -> execute(array ( $idhanghoa));
        return $getTk -> fetch();
    }
    public function HanghoaGetbyIdloaihang( $idloaihang) {
        $getTk = $this -> connect -> prepare(" SELECT * FROM hanghoa WHERE idloaihang = ? ");
        $getTk -> setFetchMode( PDO::FETCH_OBJ);
        $getTk -> execute(array ( $idloaihang));
        return $getTk -> fetchAll();
    }
}

?>