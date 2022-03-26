<?php 
include './pdo.php';
$math = null;
$tenth = isset($_POST['tenth'])?$_POST['tenth']:'';
$sql="insert into thuonghieu (math, tenth) values ( ?, ?)";
$a =[$math,$tenth];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//  echo $sql ;
//  print_r($a);
header('location:thuonghieu.php');