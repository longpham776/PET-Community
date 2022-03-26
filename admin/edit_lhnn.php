<?php 
include './pdo.php';

$m = isset($_GET['mapet'])?$_GET['mapet']:'';
$stt = isset($_GET['stt'])?$_GET['stt']:'';
if ($stt =='')
{
    header("location:lienhenhannuoi.php?mapet='$m'");exit;
}

$sql="select * from lienhenhannuoi  where stt= ? ";
$a =[$stt];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$data1 = $objStatement->fetch(PDO::FETCH_OBJ);

$sql="select * from thucung  where mapet= ? ";
$a1 =[$m];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a1);//ket qua truy van
$datapet = $objStatement->fetch(PDO::FETCH_OBJ);

$sql="select * from thucung where xoa=0";
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute();//ket qua truy van
$pet = $objStatement->fetch(PDO::FETCH_OBJ);
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
			<form action="update_lhnn.php" method='post' entype='multipart/form-data'>
				&ensp;STT: <input type="readonly" name="stt" value='<?php echo $data1->stt ?>'> <br><br>
				&ensp;Họ tên: <input type="text" name="hoten" value='<?php echo $data1->hoten ?>'> <br><br>
				&ensp;Điện thoại: <input type="number" name="dienthoai" value='<?php echo $data1->dienthoai ?>'> <br><br>
				&ensp;Email: <input type="text" name="email" value='<?php echo $data1->email ?>'> <br><br>
				&ensp;Facebook: <input type="text" name="facebook" value='<?php echo $data1->facebook ?>'> <br><br>
				&ensp;Thú cưng <select name="mapet" id="">
									<option value="<?php echo $datapet->mapet ?>"><?php echo $datapet->tenpet ?></option>
									<?php 
									foreach($pet as $r)
									{
										?>
										<option value="<?php echo $r->mapet ?>"><?php echo $r->tenpet ?></option>
										<?php
									}
									?>
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

