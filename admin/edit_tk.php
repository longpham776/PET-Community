<?php 
include './pdo.php';
$m = isset($_GET['username'])?$_GET['username']:'';
if ($m =='')
{
    header('location:taotaikhoan.php');exit;
}

$sql="select * from quantri  where username= ? ";
$a =[$m];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//$data = $objStatement->fetchAll(PDO::FETCH_OBJ);
$data1 = $objStatement->fetch(PDO::FETCH_OBJ);
// echo '<pre>';
// //print_r($data);
// print_r($data1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php 
		include './pages/head.php';
	?>
	<body>
    <div id="main-content"> <!-- Main Content Section with everything -->
		<?php 
			include './pages/sidebar.php';
		?>
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					Download From <a href="http://www.exet.tk">exet.tk</a></div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
			<form action="update_tk.php" method='post' entype='multipart/form-data'>
                Username: <input type="text" name='username' value='<?php echo $data1->username ?>' readonly> <br><br>
                Password: <input type="password" name='password' value='<?php echo $data1->password ?>'> <br><br>
				Họ tên: <input type="text" name='hoten' value='<?php echo $data1->hoten ?>'> <br><br>
				Email: <input type="text" name='email' value='<?php echo $data1->email ?>'> <br><br>
				Quyền truy cập: <select name="quyen" id="">
							<option value="1">admin</option>
							<option value="2">staff</option>
							<option value="3">user</option>
							</select><br><br>
                <input type="submit" name="sm" value="Update"><br><br>
            
            </form>	
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
</body>
  

<!-- Download From www.exet.tk-->
</html>

