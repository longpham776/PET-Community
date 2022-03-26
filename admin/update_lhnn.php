<?php 
include './pdo.php';
$stt = isset($_POST['stt'])?$_POST['stt']:'';
$hoten = isset($_POST['hoten'])?$_POST['hoten']:'';
$dienthoai = isset($_POST['dienthoai'])?$_POST['dienthoai']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$facebook = isset($_POST['facebook'])?$_POST['facebook']:0;
$mapet = isset($_POST['mapet'])?$_POST['mapet']:'';
$sql="update lienhenhannuoi set hoten=?, dienthoai=?, email=?, facebook=?, mapet=?
                    where stt=? ";
$a =[ $hoten, $dienthoai,  $email, $facebook,$mapet, $stt];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
header("location:lienhenhannuoi.php?mapet=".$mapet."");