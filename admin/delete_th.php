<?php 
include './pdo.php';
$m = isset($_GET['math'])?$_GET['math']:'';
if ($m !='')
{
    $sql="update thuonghieu set xoa=1 where math= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:thuonghieu.php');