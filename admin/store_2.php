<?php 
include './pdo.php';
$masp = isset($_POST['masp'])?$_POST['masp']:'';
$tensp = isset($_POST['tensp'])?$_POST['tensp']:'';
$gia = isset($_POST['gia'])?$_POST['gia']:'';
$mota = isset($_POST['mota'])?$_POST['mota']:'';
$congdung = isset($_POST['congdung'])?$_POST['congdung']:0;
$math = isset($_POST['math'])?$_POST['math']:'';
$loaisp = isset($_POST['maloai'])?$_POST['maloai']:'';
$hinh ='';
if ($masp==''){ header('location:sanpham.php'); exit;}
if (isset($_FILES['hinh']))
{
    if ($_FILES['hinh']['error']==0) //ok
    {
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'], "resources/images/$hinh");
    }
}
$sql="insert into sanpham (masp, tensp, mota, congdung, gia, math, loaisp, hinh) values ( ?, ?, ?, ?, ?, ?, ?, ?)";
$a =[$masp,$tensp, $mota, $congdung, $gia, $math,$loaisp, $hinh];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header('location:sanpham.php');