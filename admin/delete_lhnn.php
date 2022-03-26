<?php 
include './pdo.php';
$m = isset($_GET['mapet'])?$_GET['mapet']:'';
$stt = isset($_GET['stt'])?$_GET['stt']:'';
if ($stt !='')
{
    $sql="update lienhenhannuoi set xoa=1 where stt= ? ";
    $a =[$stt];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
}
header("location:lienhenhannuoi.php?mapet=".$m."");