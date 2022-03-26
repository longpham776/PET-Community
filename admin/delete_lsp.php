<?php 
include './pdo.php';
$m = isset($_GET['maloai'])?$_GET['maloai']:'';
if ($m !='')
{
    $sql="update loaisp set xoa=1 where maloai= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:loaisp.php');