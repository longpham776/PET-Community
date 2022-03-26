<?php 
include './pdo.php';
$maloai = null;
$tenloai = isset($_POST['tenloai'])?$_POST['tenloai']:'';
$sql="insert into loaipet (maloai, tenloai) values ( ?, ?)";
$a =[$maloai,$tenloai];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//  echo $sql ;
//  print_r($a);
header('location:loaipet.php');