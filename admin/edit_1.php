<?php 
include './pdo.php';

$m = isset($_GET['mapet'])?$_GET['mapet']:'';
if ($m =='')
{
    header('location:index.php');exit;
}

$sql="select * from bengoantrongtuan  where mapet= ? ";
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
			<form action="update_1.php" method='post' entype='multipart/form-data'>
                Mã Pet: <input type="text" name='mapet' value='<?php echo $data1->mapet ?>' readonly> <br><br>
                Tên Pet: <input type="text" name='tenpet' value='<?php echo $data1->tenpet ?>'> <br><br>
                Giới tính: <select name="gioitinh" id="">
							<option value="<?php echo $data1->gioitinh ?>"><?php echo $data1->gioitinh ?></option>
							<option value="Đực">Đực</option>
							<option value="Cái">Cái</option>
							</select> <br><br>
				Tiêm phòng: <select name="tiemphong" id="">
							<option value="<?php echo $data1->tiemphong ?>"><?php if($data1->tiemphong==0){echo "Chưa rõ";} else{echo "Có";} ?></option>
							<option value="0">Chưa rõ</option>
							<option value="1">Có</option>
							</select> <br><br>
				Tuổi: <select name="tuoi" id="">
						<option value="<?php echo $data1->tuoi ?>"><?php echo $data1->tuoi ?></option>
						<option value="Trẻ">Trẻ</option>
						<option value="Trưởng thành">Trưởng thành</option>
						</select> <br><br>
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

