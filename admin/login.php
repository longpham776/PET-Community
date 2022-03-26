<?php
ob_start();
session_start();
include_once './config.php';
include './pdo.php';
$u=isset($_POST['username'])?$_POST['username']:'';
$p=isset($_POST['password'])?$_POST['password']:'';
$sql="select * from quantri where username='$u' and password='$p'";//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
if($data==[]){
    header('location:login.html');
    exit;
}
else{
    foreach($data as $a =>$v){
        if($v->quyen==1 ||$v->quyen==2){
            $_SESSION['admin']=$data;
            header('location:index.php');
            // echo "<pre>";
            // print_r($data);
            // die;
        }
        else if($v->quyen==3){
            $_SESSION['user']=$data;
            header("location:http://localhost/20211029/");
        }
    }
}