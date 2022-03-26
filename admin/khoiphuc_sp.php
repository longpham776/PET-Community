<?php 
include './pdo.php';
$m = isset($_GET['masp'])?$_GET['masp']:'';
if ($m !='')
{
    $sql="update sanpham set xoa=0 where masp= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:delsanpham.php');