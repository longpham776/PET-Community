<?php 
include './pdo.php';
$madon=isset($_GET['madon'])?$_GET['madon']:0;
$trangthai=isset($_GET['tt'])?$_GET['tt']:0;
if($trangthai >= 1){
    header('location:hoadon.php');
    exit;
}
$sql="update donhang set trangthai=4 where madon=? ";
$a =[ $madon];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
header('location:hoadon.php');