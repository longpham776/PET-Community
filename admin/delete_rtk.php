<?php 
include './pdo.php';
$m = isset($_GET['username'])?$_GET['username']:'';
if ($m !='')
{
    $sql="delete from quantri where username= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:deltaikhoan.php');