<?php 
include './pdo.php';
$magopy = NULL;
$hoten = isset($_POST['hoten'])?$_POST['hoten']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$tieude = isset($_POST['tieude'])?$_POST['tieude']:'';
$noidung = isset($_POST['noidung'])?$_POST['noidung']:'';
$sql="insert into gopy (magopy, hoten, email, tieude, noidung) values ( ?, ?, ?, ?, ?)";
$a =[$magopy,$hoten, $email, $tieude, $noidung];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header('location:contact.php');