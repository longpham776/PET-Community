<?php 
include './pdo.php';
$m = isset($_GET['masp'])?$_GET['masp']:'';
if ($m !='')
{
    $sql="update spnoibat set xoa=1 where masp= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:sanphamnoibat.php');