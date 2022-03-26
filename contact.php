<?php 
include_once './config.php';
include './pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PET Community - Liên hệ</title>
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

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
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


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Liên hệ chúng tôi</h1>
            <p>
                Chúng mình sẽ nhận ý kiến phản hồi để hỗ trợ cũng như cải thiện hoạt động của nhóm. <br>Thanks All!
            </p>
        </div>
    </div>

    <!-- Start Map -->
    <?php
        // include "./pages/map.php"
    ?>
    <div class=""> 
        <iframe width="100%" height="300" class="lazy mb-5 loaded show" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9541599824643!2d106.67568071443705!3d10.73801649234761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1608368431152!5m2!1svi!2s" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9541599824643!2d106.67568071443705!3d10.73801649234761!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad027e3727%3A0x2a77b414e887f86d!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1608368431152!5m2!1svi!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" data-lazied="IMG"></iframe> 
    </div> 
    <!-- Ena Map -->
    
    <!-- Start Contact -->
    <?php
        include "./pages/form-contact.php"
    ?>
    <!-- End Contact -->


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