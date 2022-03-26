<?php 
include './pdo.php';
$m = isset($_GET['mapet'])?$_GET['mapet']:'';
if ($m !='')
{
    $sql="update bengoantrongtuan set xoa=0 where mapet= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:danhsachkhoiphuc.php');