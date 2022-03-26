<?php 
include_once './config.php';
$objPDO = new PDO('mysql:host=' .HOST.';dbname=' . DB,   USER  ,PW );
$objPDO->query('set names utf8');

/* 
1./ ket noi 
2. viet sql 
3./ Thuc thi PDO->lenh prepare -> return Statement
4./ thuc thi sql  tu Statement
5./ Xu ly ket qua
*/

