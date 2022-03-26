<?php 
include './pdo.php';
$masp = isset($_POST['masp'])?$_POST['masp']:'';
$tensp = isset($_POST['tensp'])?$_POST['tensp']:'';
$gia = isset($_POST['gia'])?$_POST['gia']:'';
$mota = isset($_POST['mota'])?$_POST['mota']:'';
$hinh ='';
if ($masp==''){ header('location:sanphamnoibat.php'); exit;}
if (isset($_FILES['hinh']))
{
    if ($_FILES['hinh']['error']==0) //ok
    {
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'], "resources/images/$hinh");
    }
}
$sql="insert into spnoibat (masp, tensp, gia, mota, hinh) values ( ?, ?, ?, ?, ?)";
$a =[$masp,$tensp, $gia, $mota, $hinh];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header('location:sanphamnoibat.php');