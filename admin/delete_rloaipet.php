<?php 
include './pdo.php';
$m = isset($_GET['maloai'])?$_GET['maloai']:'';
if ($m !='')
{
    $sql="delete from loaipet where maloai= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:delloaipet.php');