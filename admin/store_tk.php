<?php 
include_once './config.php';
include './pdo.php';
if(!isset($_SESSION)) session_start();
$u=isset($_POST['username'])?$_POST['username']:'';
$p=isset($_POST['password'])?$_POST['password']:'';
$ht=isset($_POST['hoten'])?$_POST['hoten']:'';
$e=isset($_POST['email'])?$_POST['email']:'';
$quyen=2;
$sql='select * from quantri';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
foreach($data as $a){
    if ($u==$a->username || $e==$a->email){
        header('location:taotaikhoan.php');
        exit;
    }
}
$sql="insert into quantri (username, password, hoten, email, quyen) values ( ?, ?, ?, ?, ?)";
$a =[$u,$p, $ht, $e, $quyen];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//  echo "<pre>Da them $n dong";
//  echo $sql ;
//  print_r($a);
header('location:taotaikhoan.php');