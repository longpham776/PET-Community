<?php 
include './pdo.php';
$madon=isset($_POST['madon'])?$_POST['madon']:0;
$trangthai=isset($_POST['trangthai'])?$_POST['trangthai']:0;
if($trangthai==3 || $trangthai >= 4){
    header('location:donhang.php');
    exit;
}
$trangthai+=1;
$sql="update donhang set trangthai=? where madon=? ";
$a =[ $trangthai, $madon];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
header('location:donhang.php');