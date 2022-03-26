<?php 
include './pdo.php';

$m = isset($_GET['masp'])?$_GET['masp']:'';
if ($m =='')
{
    header('location:sanpham.php');exit;
}

$sql="select * from sanpham  where masp= ? ";
$a =[$m];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
//$data = $objStatement->fetchAll(PDO::FETCH_OBJ);
$data1 = $objStatement->fetch(PDO::FETCH_OBJ);
// echo '<pre>';
// //print_r($data);
// print_r($data1);
$sql='select * from loaisp';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$dataLoai = $objStatement->fetchAll(PDO::FETCH_OBJ);

$sql='select * from thuonghieu';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$datath = $objStatement->fetchAll(PDO::FETCH_OBJ);
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
			<form action="update_2.php" method='post'>
				Mã sản phẩm: <input type="text" name="masp" readonly value='<?php echo $data1->masp ?>'> <br><br>
				Tên sản phẩm: <input type="text" name="tensp" value='<?php echo $data1->tensp ?>'> <br><br>
				Mô tả: <textarea name="mota" id="" cols="30" rows="3" ><?php echo $data1->mota ?></textarea> <br><br>
				Công dụng: <textarea name="congdung" id="" cols="30" rows="10"><?php echo $data1->congdung ?></textarea> <br><br>
				Giá: <input type="number" name="gia" value='<?php echo $data1->gia ?>'> <br><br>
				Thương hiệu: <select name="math" id="">
							<option value="<?php echo $data1->math ?>">
							<?php 
								foreach($datath as $r)
								{
									if($r->math==$data1->math){
										echo $r->tenth;
										break;
									}
								}
							?>
							</option>
							<?php 
								foreach($datath as $r)
								{
									?>
									<option value="<?php echo $r->math ?>"><?php echo $r->tenth ?></option>
									<?php
								}
							?>
							</select> <br><br>
				Loại sản phẩm: <select name="maloai" id="">
							<option value="<?php echo $data1->loaisp ?>">
							<?php 
								foreach($dataLoai as $r)
								{
									if($r->maloai==$data1->loaisp){
										echo $r->tenloai;
										break;
									}
								}
							?>
							</option>
							<?php 
								foreach($dataLoai as $r)
								{
									?>
									<option value="<?php echo $r->maloai ?>"><?php echo $r->tenloai ?></option>
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

