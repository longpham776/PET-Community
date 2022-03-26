<?php 
$sql='select * from spnoibat';//2 
$objStatament = $objPDO->prepare($sql);
$objStatament->execute();
$n = $objStatament->rowCount();
// echo "Co $n ket qua";
$data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($data);
?>
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Sản Phẩm Nổi Bật</h1>
                <p>
                Phụ kiện chó mèo, thú cưng là những sản phẩm giúp nuôi và hỗ trợ chăm sóc vật nuôi mà mỗi người nuôi đều cần phải quan tâm. Vậy sản phẩm phụ kiện cho chó mèo và vật nuôi gồm những gì? Hãy cùng PET Shop – Siêu thị thú cưng tìm hiểu để biết được phải mua những đồ dùng nào cần thiết, giá rẻ chất lượng cho thú cưng nhà mình nhé.
                </p>
            </div>
        </div>
        <div class="row">
        <?php 
                foreach($data as $sp)
                {
                    ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="shop-single.html">
                                <img src="./assets/img/<?php echo $sp->hinh ?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right"><?php echo $sp->gia ?><u>đ</u></li>
                                </ul>
                                <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?php echo $sp->tensp ?></a>
                                <p class="card-text">
                                <?php echo $sp->mota ?>
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
        ?>
        </div>
    </div>
</section>