<?php 
include './pdo.php';
$u=isset($_POST['username'])?$_POST['username']:'';
$p=isset($_POST['password'])?$_POST['password']:'';
$ht=isset($_POST['hoten'])?$_POST['hoten']:'';
$e=isset($_POST['email'])?$_POST['email']:'';
$q=isset($_POST['quyen'])?$_POST['quyen']:'';
$sql="update quantri set password=?,hoten=?,email=?,quyen=? where username=? ";
$a =[ $p,$ht,$e,$q,$u];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:taotaikhoan.php');