<?php 
    include './checklogin.php';
    include_once './config.php';
    include './pdo.php';
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $masp=$_POST['masp'];
        $tensp=$_POST['tensp'];
        $gia=$_POST['gia'];
        $hinh=$_POST['hinh'];
        $soluong=$_POST['soluong'];
        
        //kiem tra sp co trong gio hang hay khong?

        $fl=0; //kiem tra sp co trung trong gio hang khong?

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew=$soluong+$_SESSION['giohang'][$i][4];
                $_SESSION['giohang'][$i][4]=$soluongnew;
                break;

            }
            
        }
        //neu khong trung sp trong gio hang thi them moi
        if($fl==0){
            //them moi sp vao gio hang
            $sp=[$masp,$tensp,$gia,$hinh,$soluong];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    }

    $hoten=isset($_POST['hoten'])?($_POST['hoten']):'';
    $diachi=isset($_POST['diachi'])?($_POST['diachi']):'';
    $sdt=isset($_POST['dienthoai'])?($_POST['dienthoai']):0;
    $email=isset($_POST['email'])?($_POST['email']):'';
    $pttt=isset($_POST['pttt'])?($_POST['pttt']):0;
    $trangthai=0;
    $thanhtien=0;
    if(isset($_SESSION['user'])){
        foreach($_SESSION['user'] as $a){
            $username=$a->username;
        }
    }
    if($_SESSION['giohang']!=[]){
        //Lưu đơn hàng
        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][4];
            $thanhtien+=$tt;
        }
        $sql="insert into donhang (username,hoten,diachi,dienthoai,email,pttt,trangthai,thanhtien) values ('$username','$hoten','$diachi','$sdt','$email','$pttt','$trangthai','$thanhtien')";
        $objStatement= $objPDO->prepare($sql);//return B
        $objStatement->execute();//ket qua truy van
        $last_id = $objPDO->lastInsertId();
        //Lưu giỏ hàng
        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            $masp=$_SESSION['giohang'][$i][0];
            $tensp=$_SESSION['giohang'][$i][1];
            $gia=$_SESSION['giohang'][$i][2];
            $hinh=$_SESSION['giohang'][$i][3];
            $soluong=$_SESSION['giohang'][$i][4];
            $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][4];
            $sql="insert into giohang (masp,tensp,gia,hinh,soluong,thanhtien,madon) values ('$masp','$tensp','$gia','$hinh','$soluong','$tt','$last_id')";
            $objStatement= $objPDO->prepare($sql);//return B
            $objStatement->execute();//ket qua truy van
        }
    }
    
    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][4];
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td>'.$_SESSION['giohang'][$i][0].'</td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td><img src="admin/resources/images/'.$_SESSION['giohang'][$i][3].'" style="width:100px;height:100px;" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][4].'</td>
                            <td><div>'.$tt.'</div></td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="6">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }
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
                    <h1>THÔNG TIN ĐƠN HÀNG</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><?php echo $hoten; ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><?php echo $diachi; ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><?php echo $sdt; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán</td>
                            <td><?php if($pttt==0) echo "Thanh toán khi nhận hàng"; else echo "Thanh toán online"; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="row mb">
                    <h1>ĐƠN HÀNG</h1>
                    <table border="1" >
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>&ensp;&ensp;Hình</th>
                            <th>Số lượng</th>
                            <th>Thành tiền ($)</th>
                        </tr>
                        <?php showgiohang(); unset($_SESSION['giohang']);?>
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