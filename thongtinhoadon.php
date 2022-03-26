<?php 
    include './checklogin.php';
    include_once './config.php';
    include './pdo.php';
    
    $m = isset($_GET['madon'])?$_GET['madon']:'';
    if ($m =='')
    {
        header('location:hoadon.php');exit;
    }
    $sql="select * from giohang where madon=? and xoa=0";//2 
    $a =[$m];
    $objStatament = $objPDO->prepare($sql);
    $objStatament->execute($a);
    $data = $objStatament->fetchAll(PDO::FETCH_OBJ);

    $sql="select * from donhang where madon=?";//2 
    $a =[$m];
    $objStatament = $objPDO->prepare($sql);
    $objStatament->execute($a);
    $datadon = $objStatament->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đơn hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

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


    <div class="container py-5">
        <div class="row mb ">
            <div class="box mr" id="bill">
                <div class="row" >
                    <h1>THÔNG TIN HÓA ĐƠN</h1>
                    <?php foreach($datadon as $dh){ ?> 
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><strong><?php echo $dh->hoten ?></strong></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><strong><?php echo $dh->diachi ?></strong></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><strong><?php echo $dh->dienthoai ?></strong></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><strong><?php echo $dh->email ?></strong></td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán</td>
                            <td><?php if($dh->pttt==0) echo "<strong>Thanh toán khi nhận hàng</strong>"; else echo "<strong>Thanh toán online</strong>"; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="row mb">
                    <h1>GIỎ HÀNG</h1>
                    <table border="1" >
                        <tr>
                            <th>STT</th>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Hình</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                        </tr>
                        <?php 
                        foreach($data as $gh)
                        {
                            ?>
                            <tr>
                                <td><h5><?php echo $gh->stt ?><h5></td>
                                <td><h5><?php echo $gh->masp ?><h5></td>
                                <td><h5><?php echo $gh->tensp ?><h5></td>
                                <td><h5><?php echo $gh->gia ?><h5></td>
                                <td><img src='./resources/images/<?php echo $gh->hinh ?>' style="width:100px;height:100px;"> </td>
                                <td><h5><?php echo $gh->soluong ?><h5></td>
                                <td><h5><?php echo $gh->thanhtien ?><h5></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>



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