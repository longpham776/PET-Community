<?php 
include './pdo.php';
$masp = isset($_POST['masp'])?$_POST['masp']:'';
$tensp = isset($_POST['tensp'])?$_POST['tensp']:'';
$gia = isset($_POST['gia'])?$_POST['gia']:'';
$mota = isset($_POST['mota'])?$_POST['mota']:'';
$sql="update spnoibat set tensp=?, gia=?, mota=?, 
                    where masp=? ";
$a =[ $tensp, $gia,  $mota, $masp];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:sanphamnoibat.php');