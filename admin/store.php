<?php 
include './pdo.php';
$mapet = NULL;
$tenpet = isset($_POST['tenpet'])?$_POST['tenpet']:'';
$gioitinh = isset($_POST['gioitinh'])?$_POST['gioitinh']:'';
$tuoi = isset($_POST['tuoi'])?$_POST['tuoi']:'';
$tiemphong = isset($_POST['tiemphong'])?$_POST['tiemphong']:0;
$maloai =  isset($_POST['maloai'])?$_POST['maloai']:1;
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
$sql="insert into thucung (mapet, tenpet, gioitinh, tuoi, tiemphong, maloai, hinh) values (?, ?, ?, ?, ?, ?, ?)";
$a =[$mapet,$tenpet, $gioitinh, $tuoi, $tiemphong, $maloai, $hinh];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header('location:index');