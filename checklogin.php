<?php
ob_start();
session_start();
if(!isset($_SESSION['user'])){
    header("location:admin/login.html");
}