<?php 
include './pdo.php';
$m = isset($_GET['mapet'])?$_GET['mapet']:'';
if ($m !='')
{
    $sql="update thucung set xoa=1 where mapet= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:index.php');