<?php 
    require '../../elements_TMNN/mod/loaihangCls.php';
    if(isset($_GET['reqact'])) {
        $requsetAction = $_GET['reqact'];
        switch ($requsetAction) {
            case 'addnew':
                $tenloaihang = $_POST['tenloaihang'];
                $tenhinhanh = $_POST['tenhinhanh'];
                $hinhanh = $_FILES['fileimage']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                $loaihang = new loaihang();
                $rs = $loaihang -> LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh);
                if ($rs) {
                    header('location:../../index.php?req=loaihangView&result=ok');
                }
                else {
                    header('location:../../index.php?req=loaihangView&result=notok');
                }
                break;
            case 'deleteloaihang':
                $idloaihang = $_GET['idloaihang'];
                $loaihang = new loaihang();
                $rs = $loaihang -> LoaihangDelete($idloaihang);
                if ($rs) {
                    header('location:../../index.php?req=loaihangView&result=ok');
                }
                else {
                    header('location:../../index.php?req=loaihangView&result=notok');
                }
                break;
            case 'updateloaihang':
                $idloaihang = $_POST['idloaihang'];
                $tenloaihang = $_POST['tenloaihang'];
                $tenhinhanh = $_POST['tenhinhanh'];
                if($_FILES['fileimage']['tmp_name'] == false){
                    $hinhanh = $_POST['hinhanh'];
                } else {
                    $hinhanh = $_FILES['fileimage']['tmp_name'];
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                }
                $loaihang = new loaihang();
                $rs = $loaihang -> LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);
                if($rs){
                    header('location:../../index.php?req=loaihangView&result=ok');
                } else {
                    header('location:../../index.php?req=loaihangView&result=notok');
                }
                break;
            default :
                header('location:../../index.php?req=loaihangView');
                break;
        }
    } else {
        header('location:../../index.php?req=loaihangView');

    }
