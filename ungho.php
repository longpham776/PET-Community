<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Community - Ủng hộ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/PET.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
    <style>
        .services .services-list {margin: 0 -1px}
 .services .services-list:after {
    display: block;
    content: "";
    clear: both
}
 .services .services-list li {
    position: relative;
    overflow: hidden
}
@media (min-width: 992px) {
     .services .services-list li {
        float: left;
        width: 24%;
        width: -webkit-calc(25% - 2px);
        width: calc(25% - 2px);
        margin: 1px
    }
}
 .services .services-list li img {
    width: 100%;
    -webkit-transition: -webkit-transform .3s ease-out;
    transition: -webkit-transform .3s ease-out;
    transition: transform .3s ease-out;
    transition: transform .3s ease-out, -webkit-transform .3s ease-out
}
 .services .services-list li .detail {
    position: absolute;
    width: 100%;
    top: 50%;
    left: 0;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    text-align: center
}
 .services .services-list li .detail h3 {
    margin: 0;
    font-size: 225%;
    color: #FFFFFF;
    text-transform: uppercase;
    font-family: UTMBebas, sans-serif
}
@media (min-width: 1400px) {
     .services .services-list li .detail h3 {font-size: 260%}
}
@media (min-width: 1600px) {
    .services .services-list li .detail h3 {font-size: 285%}
}
 .services .services-list li .detail a {
    display: inline-block;
    margin: 8px auto 0;
    color: #FFFFFF;
    border-bottom: 1px solid #FFFFFF;
    -webkit-transition: all .2s;
    transition: all .2s
}
 .services .services-list li .detail a:hover {
    color: #FFF444;
    border-bottom-color: #FFF444
}
.services .services-list li:hover img {
    -webkit-transform: scale(1.15);
    -ms-transform: scale(1.15);
    transform: scale(1.15)
}
.text hr{
    border:none;
  border-top:1px dotted #000000;
  color:#000000;
  background-color:#fff;
  height:1px;
  width:100%;
}
/////
.line-through p{
   -webkit-text-decoration-line: line-through; /* Safari */
   text-decoration-line: line-through; 
}
    </style>
</head>

<body>
    <!-- Start Top Nav -->
    <?php
        include "./pages/nav.php"
    ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
        include "./pages/header.php"
    ?>
    <!-- Close Header -->

    <!-- Modal -->
    <?php
        include "./pages/modal.php"
    ?>



    <!-- Start Banner Hero -->
    <?php
        include "./pages/banner.php"
    ?>
    <!-- End Banner Hero -->
    <br>
    <section class="container aos-init aos-animate" data-aos="zoom-in">
		<div class="row">
			<div class="col-sm-8 col-md-8 col-lg-8">
				<h3 class="text-capitalize">tôi muốn ủng hộ</h3>
				<hr class="small-divider left">
				<p class="mt-4 text-justify">
					Mọi hoạt động cứu hộ của Pet Community hoàn toàn dựa trên các khoản quyên góp từ cộng đồng. Chi phí trung bình hàng tháng của nhóm rơi vào khoảng 70 triệu đồng, bao gồm tiền thuê nhà, tiền viện phí, thức ăn, điện, nước, thuốc men và đồ dùng, bỉm tã, lương hỗ trợ các bạn tnv dọn dẹp... Nhóm rất cần sự giúp đỡ của các bạn để có thể duy trì nhà chung cũng như đội cứu hộ. Chỉ cần cố định 50k - 100k hàng tháng là các bạn đã giúp đỡ được cho nhóm và cách bé rất nhiều!<br><br>Chi phí sẽ được chia đều cho các bé khác còn nằm viện và gây dựng nhà chung. Ngoài ra Nhóm cũng tiếp nhận quyên góp bằng hiện vật như quần áo cũ (để lót chuồng), bỉm, găng tay y tế, thức ăn, cát vệ sinh v.v... <br><br>*Lưu ý: nhóm không dùng zalo và KHÔNG BAO GIỜ yêu cầu Mạnh Thường Quân cung cấp thông tin thẻ hoặc mã OTP<br><br>🧧Danh sách Mạnh Thường Quân quyên góp cho nhóm sẽ được cập nhật thường xuyên tại đây:<br>2021: http://bit.ly/3oOVp3N<br>2020: http://bit.ly/2RLgOgs<br>2019: http://bit.ly/31cYEXs<br>2018: http://bit.ly/2K5hr1K<br><br>📜Link thống kê viện phí <br>2021: http://bit.ly/3p89xo5<br>2020: https://bit.ly/2ULxqGA<br>2019: http://bit.ly/2XynRtp<br><br>🗳️ Địa điểm đặt hòm quyên góp: <br>PET World Saigon số 180 Cao lỗ HCM<br>Phòng khám Animal Care: nhà 20 ngõ 424 Xuân Thùy
				</p>

					<a href="contact.php" class="btn btn-primary mt-4 ml-1 text-uppercase" aria-label="Ủng hộ ngay" aria-labelledby="Ủng hộ ngay">Ủng hộ ngay</a>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4 res-margin">
					<img data-src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg" class="rounded img-fluid img-lazy-load" alt="Tôi muốn ủng hộ" src="https://www.hanoipetadoption.com/admin/user-content/256b940f-9028-443d-8fcf-f39f5f1618af.jpg">
			</div>
		</div>
	</section>
    <br>
    <!-- Start Footer -->
    <?php
        include "./pages/footer.php"
    ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <?php
        include "./pages/script.php"
    ?>
    <!-- End Script -->
</body>

</html>