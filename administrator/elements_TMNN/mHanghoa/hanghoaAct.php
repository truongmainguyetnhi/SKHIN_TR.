<?php 
require '../../elements_TMNN/mod/hanghoaCls.php';
if(isset($_GET['reqact'])){
    $requsetAction = $_GET['reqact'];
    switch ($requsetAction){
        case 'addnew':
            $tenhanghoa = $_POST['tenhanghoa'];
            $mota = $_POST['mota'];
            $giathamkhao = $_POST['giathamkhao'];
            $tenhinhanh =$_POST['tenhinhanh'];
            $idloaihang = $_POST['idloaihang'];
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang);
            if($rs){
                header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=ok');
            }
            break;
            case 'deletehanghoa':
                $idhanghoa = $_GET['idhanghoa'];
                $hanghoa = new hanghoa();
                $rs = $hanghoa->HanghoaDelete($idhanghoa);
                if($rs){
                    header('location:../../index.php?req=hanghoaView&result=ok');
                } else {
                    header('location:../../index.php?req=hanghoaView&result=notok');
                }
                break;
            case 'updatehanghoa':
                $idhanghoa = $_POST['idhanghoa'];
                $tenhanghoa = $_POST['tenhanghoa'];
                $mota = $_POST['mota'];
                $giathamkhao = $_POST['giathamkhao'];
                $idloaihang = $_POST['idloaihang'];
                $tenhinhanh = $_POST['tenhinhanh'];
                if($_FILES['fileimage']['tmp_name'] == false){
                    $hinhanh = $_POST['hinhanh'];
                } else {
                    $hinhanh = $_FILES['fileimage']['tmp_name'];
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                }
                $hanghoa = new hanghoa();
                $rs = $hanghoa -> HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa);
                if($rs){
                    header('location:../../index.php?req=hanghoaView&result=ok');
                } else {
                    header('location:../../index.php?req=hanghoaView&result=notok');
                }
                break;
    }
} else {
    header('../../index.php?req=hanghoaView');
}
?>