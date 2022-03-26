<?php 
include './pdo.php';
$math= isset($_POST['math'])?$_POST['math']:'';
$tenth = isset($_POST['tenth'])?$_POST['tenth']:'';
$sql="update thuonghieu set tenth=? where math=? ";
$a =[ $tenth, $math];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:thuonghieu.php');