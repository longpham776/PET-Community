<?php 
include './pdo.php';
$maloai= isset($_POST['maloai'])?$_POST['maloai']:'';
$tenloai = isset($_POST['tenloai'])?$_POST['tenloai']:'';
$sql="update loaipet set tenloai=? where maloai=? ";
$a =[ $tenloai, $maloai];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:loaipet.php');