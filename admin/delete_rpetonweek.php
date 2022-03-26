<?php 
include './pdo.php';
$m = isset($_GET['mapet'])?$_GET['mapet']:'';
if ($m !='')
{
    $sql="delete from bengoantrongtuan where mapet= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:bengoantrongtuan.php');