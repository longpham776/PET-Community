<?php
include_once './config.php';
include './pdo.php';
$sql='select * from quantri';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
if(!isset($_SESSION)) session_start();
$u=isset($_POST['username'])?$_POST['username']:'';
$p=isset($_POST['password'])?$_POST['password']:'';
$ht=isset($_POST['hoten'])?$_POST['hoten']:'';
$e=isset($_POST['email'])?$_POST['email']:'';
$quyen=3;
foreach($data as $a){
    if ($u==$a->username || $e==$a->email){
        header('location:dangky.html');
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
include "./resources/lib/PHPMailerAutoload.php";
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "dh51800895@gmail.com"; //your SMTP username or your gmail username
$mail->Password = "longpham.74"; // your SMTP password or your gmail password
$from = "dh51800895@gmail.com"; // Reply to this email
$to=$_REQUEST["email"]; // Email người nhận
$name="Test Send mail"; // Tên người nhận
$mail->From = $from;
$mail->FromName = "Pet online"; // Tên người gửi 
$mail->AddAddress($to,$name);
$mail->AddReplyTo($from,"Phong cham soc nguoi dung");
$mail->WordWrap = 50; // set word wrap
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Tin xac nhan!";
$mail->Body = "Đăng ký thành công .<hr> Có thể đăng nhập tại: <a href='". BASE_URL."'>".BASE_URL."</a>";
//$mail->SMTPDebug = 2;
if(!$mail->Send())
{
    echo "<h3>Err: " . $mail->ErrorInfo . '</h3>';
    header('location:dangky.html');
}
else
{
    echo "<h3>Send mail thành công</h3>";
    header('location:admin/login.html');
}