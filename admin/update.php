<?php 
include './pdo.php';
$m = isset($_POST['mapet'])?$_POST['mapet']:'';
$t = isset($_POST['tenpet'])?$_POST['tenpet']:'';
$gt = isset($_POST['gioitinh'])?$_POST['gioitinh']:'';
$tp = isset($_POST['tiemphong'])?$_POST['tiemphong']:0;
$tuoi = isset($_POST['tuoi'])?$_POST['tuoi']:'';
$maloai =  isset($_POST['maloai'])?$_POST['maloai']:1;
$sql="update thucung set tenpet=?, gioitinh=?, tiemphong=?, tuoi=?, maloai=?
                    where mapet=? ";
$a =[ $t, $gt,  $tp, $tuoi, $maloai, $m];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:index');