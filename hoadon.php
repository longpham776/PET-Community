<?php 
    include './checklogin.php';
    include_once './config.php';
    include './pdo.php';
    if(isset($_SESSION['user'])){
        foreach($_SESSION['user'] as $a){
            $username=$a->username;
        }
    }
    
    $sql="select * from donhang where username='$username'";
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute();//ket qua truy van
    $data = $objStatement->fetchAll(PDO::FETCH_OBJ);
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
                <div class="row mb">
                    <h1>HÓA ĐƠN</h1>
                    <table border="1" >
                        <tr>
                            <th>Mã Đơn</th>
                            <th>Họ Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Điện Thoại</th>
                            <th>Email</th>
                            <th>Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Thành tiền</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php foreach($data as $dh) { ?>
                        <tr>
                            <td><h5><?php echo $dh->madon ?><h5></td>
                            <td><h5><?php echo $dh->hoten ?><h5></td>
                            <td><h5><?php echo $dh->diachi ?><h5></td>
                            <td><h5><?php echo $dh->dienthoai ?><h5></td>
                            <td><h5><?php echo $dh->email ?><h5></td>
                            <td><h5><?php if($dh->pttt == 0){echo "Trực tiếp";} else{echo "Online";} ?><h5></td>
                            <td>
                                <?php if($dh->trangthai == 0)
                                {
                                    ?>
                                    <input type="submit" style="background-color: #FF0000;font-size: 20px;" name="sm" 
                                    value="<?php echo "Chờ xác nhận";?>"
                                    <?php
                                }
                                else if($dh->trangthai == 1)
                                {
                                    ?>
                                    <input type="submit" style="background-color: #FFA500;font-size: 20px;" name="sm" 
                                    value="<?php echo "Chờ lấy hàng";?>"
                                    <?php
                                }
                                else if($dh->trangthai == 2)
                                {
                                    ?>
                                    <input type="submit" style="background-color: #FFA500;font-size: 20px;" name="sm" 
                                    value="<?php echo "Đang giao";?>"
                                    <?php
                                }
                                else if($dh->trangthai == 3)
                                {
                                    ?>
                                    <input type="submit" style="background-color: #4CAF50;font-size: 20px;"  name="sm" 
                                    value="<?php echo "Đã giao";?>"
                                    <?php
                                }
                                else if($dh->trangthai == 4)
                                {
                                    ?>
                                    <input type="submit" style="background-color: #FF0000;font-size: 20px;"  name="sm" value="<?php echo "Đã hủy";?>"
                                    <?php
                                }
                                ?>">
                            </td>
                            <td><h5><?php echo $dh->thanhtien ?><h5></td>
                            <td>
                                <!-- Icons -->
                                    <!-- <a href="edit_1.php?mapet=" 
                                    onclick="return confirm('Bạn muốn sửa thú cưng có tên là  ?')"
                                    title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a> -->
                                    <a href="huydonhang.php?madon=<?php echo $dh->madon ?>&tt=<?php echo $dh->trangthai ?>" 
                                    onclick="return confirm('Bạn muốn hủy đơn hàng có mã là <?php echo $dh->madon ?> ?')"
                                    title="Hủy đơn"><img src="resources/images/icons/cross.png" alt="Hủy đơn" /></a> 
                                    <a href="thongtinhoadon.php?madon=<?php echo $dh->madon ?>" 
                                    title="Thông tin hóa đơn"><img src="resources/images/icons/information.png" alt="Thông tin đơn hàng" /></a> 
                            </td>
                        </tr>
                        <?php } ?>
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