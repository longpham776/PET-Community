<?php 
include './pdo.php';
$m = isset($_GET['username'])?$_GET['username']:'';
if ($m !='')
{
    $sql="update quantri set xoa=1 where username= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:taotaikhoan.php');