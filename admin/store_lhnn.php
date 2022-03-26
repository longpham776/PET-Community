<?php 
include './pdo.php';
$hoten = isset($_POST['hoten'])?$_POST['hoten']:'';
$dienthoai = isset($_POST['dienthoai'])?$_POST['dienthoai']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$facebook = isset($_POST['facebook'])?$_POST['facebook']:'';
$mapet = isset($_POST['mapet'])?$_POST['mapet']:'';
$hinh ='';
//if ($mapet==''){ header('location:index.php'); exit;}
if (isset($_FILES['hinh']))
{
    if ($_FILES['hinh']['error']==0) //ok
    {
        $hinh = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'], "resources/images/$hinh");
    }
}
$sql="insert into lienhenhannuoi (hoten, dienthoai, email, facebook,mapet, hinh) values (?, ?, ?, ?, ?, ?)";
$a =[$hoten, $dienthoai, $email, $facebook,$mapet, $hinh];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header("location:lienhenhannuoi.php?mapet='$mapet'");