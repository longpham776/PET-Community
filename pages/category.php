<?php 
$sql='select * from bengoantrongtuan';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($data);
?>
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">BÉ NGOAN TRONG TUẦN</h1>
            <p>
                
            </p>
        </div>
    </div>
    <section class="services  service-service" id="service-service-0">
        <ul class="services-list">
        <?php 
                foreach($data as $pet)
                {
                    ?>
                    <form action="">
                    <li class="col-12 col-md-4 p-5 mt-3">
                        <a href="#"><img class="" src="./assets/img/<?php echo $pet->hinh ?>" alt="" /></a>
                        <hr>
                        <h3><?php echo $pet->tenpet ?></h3>
                        <hr>
                        <i class="fas fa-h2">Giới tính: <?php echo $pet->gioitinh ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Tuổi: <?php echo $pet->tuoi ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Tiêm phòng: <?php if($pet->tiemphong==0){echo "Chưa rõ";} else{echo "Có";} ?></i>
                        <br><br>
                        <a class="btn btn-secondary" href="https://www.facebook.com/profile.php?=75548495 " target="_blank" rel="noreferrer" aria-label="Nhận nuôi" aria-labelledby="Nhận nuôi">Nhận nuôi</a>
                    </li>
                    </form>
                    <?php
                }
        ?>
        </ul>
    </section>
    
</section>