<?php 
// $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
// $current_page=isset($_GET['page'])?$_GET['page']:1;
// $offset=($current_page-1)*$item_per_page;
// $sql="select * from thucung where xoa=0 order by mapet asc limit ".$item_per_page." offset ".$offset." ";//2 
// $objStatament = $objPDO->prepare($sql);
// $objStatament->execute();
// $data = $objStatament->fetchAll(PDO::FETCH_OBJ);
// $n = $objStatament->rowCount();
// $totalpage=ceil($n/$item_per_page);

// $data = $objStatament->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';print_r($totalpage);
$kw=isset($_POST['kw'])?$_POST['kw']:'';
// $gt=isset($_POST['gioitinh'])?$_POST['gioitinh']:'';
// $tuoi=isset($_POST['tuoi'])?$_POST['tuoi']:'';
// $tp=isset($_POST['tiemphong'])?$_POST['tiemphong']:0;
if ($kw!=NULL){
    $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($current_page-1)*$item_per_page;
    $sql="select * from thucung where tenpet like ? order by mapet asc limit ".$item_per_page." offset ".$offset." ";
    $a =["%$kw%"];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    $data = $objStatement->fetchAll(PDO::FETCH_OBJ );
    $n = $objStatement->rowCount();
    $totalpage=ceil($n/$item_per_page);
}
else{
    $item_per_page=isset($_GET['per_page'])?$_GET['per_page']:8;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($current_page-1)*$item_per_page;
    $sql="select * from thucung where tenpet like ? order by mapet asc limit ".$item_per_page." offset ".$offset." ";
    $a =["%$kw%"];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    $data = $objStatement->fetchAll(PDO::FETCH_OBJ );
    $n = $objStatement->rowCount();
    $totalpage=ceil($n/$item_per_page);
}
?>
<br><br>
<section class="container aos-init aos-animate" data-aos="zoom-in">
    <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <h3 class="text-capitalize">quy tr??nh nh???n nu??i</h3>
                <hr class="small-divider left">
                <p class="mt-4 text-justify">
                    Tr?????c khi quy???t ?????nh nh???n nu??i b?? ch?? hay m??o n??o, b???n h??y t??? h???i b???n th??n r???ng m??nh ???? s???n s??ng ????? ch???u tr??ch nhi???m c??? ?????i cho b?? ch??a, c??? v??? t??i ch??nh, n??i ??? c??ng nh?? tinh th???n. Vi???c nh???n nu??i c???n ???????c s??? ?????ng thu???n l???n t??? b???n th??n b???n c??ng nh?? gia ????nh v?? nh???ng ng?????i li??n quan. Xin c??n nh???c k??? tr?????c khi li??n h??? v???i HPA v??? vi???c nh???n nu??i.<br><br>
                    B???n ???? s???n s??ng? H??y th???c hi???n c??c b?????c sau ????y nh??:<br><br>
                    1?????? T??m hi???u v??? th?? c??ng b???n mu???n nh???n nu??i tr??n trang web c???a HPA.<br>
                    2?????? Li??n h??? v???i T??nh nguy???n vi??n ph??? tr??ch b?? ????? t??m hi???u th??m v??? b??.<br>
                    3?????? Tham gia ph???ng v???n nh???n nu??i. <br>
                    4?????? Chu???n b??? c?? s??? v???t ch???t, k?? gi???y t??? nh???n nu??i v?? ????ng ti???n v??a ????? ????n b?? v???. <br>
                    5?????? Th?????ng xuy??n c???p nh???t v??? t??nh h??nh c???a b??, ?????c bi???t l?? khi c?? s??? c??? ????? ???????c t?? v???n k???p th???i.<br><br>
                </p>

            </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card bg-light">
                    <h5 class="text-capitalize">??i???u ki???n nh???n nu??i</h5>
                    <ul class="custom pl-0 font-weight-bold">
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>T??i ch??nh t??? ch??? v?? ???n ?????nh.
</span></div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>Ch??? ??? c??? ?????nh, ??u ti??n t???i H?? N???i
</span></div>
                            </li>
                            <li class="row no-gutters">
                                <div class="col-1"><label class="m-0"></label></div>
                                <div class="col-10"><span>Cam k???t ti??m ph??ng v?? tri???t s???n .</span></div>
                            </li>
                    </ul>
                </div>
            </div>
    </div>
</section>
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">T??M TH?? C??NG</h1>
            <form action="nhannuoi.php" method="post">
            <p>
                <div class="row pt-4">
                    <!-- <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Gi???i t??nh</label>
                            <select id="gender" name="gioitinh" class="form-control">
                                <option value="">T???t c???</option>
                                <option value="?????c">?????c</option>
                                <option value="C??i">C??i</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>????? tu???i</label>
                            <select id="age" name="tuoi" class="form-control">
                                <option value="">T???t c???</option>
                                    <option value="Tr???">Tr???</option>
                                    <option value="Tr?????ng th??nh">Tr?????ng th??nh</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Ti??m ph??ng</label>
                            <select id="sterilizations" name="tiemphong" class="form-control">
                                <option value="">T???t c???</option>
                                <option value="1">C??</option>
                                <option value="0">Ch??a r??</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>T??n</label>
                            <input type="text" id="name" name="kw" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 justify-content-center align-self-center text-center">
                        <div class="form-group mb-0 pt-lg-2">
                            <button id="btnSearch" class="btn btn-secondary aos-init aos-animate" aria-label="T??m ki???m" aria-labelledby="T??m ki???m">T??m ki???m</button>
                        </div>
                    </div>
                </div>
            </p>
        </form>
        </div>
    </div>
    <section class="services  service-service" id="service-service-0">
        <ul class="services-list">
        <?php 
                foreach($data as $pet)
                {
                    ?>
                    <li class="col-12 col-md-4 p-5 mt-3">
                        <a href="#"><img class="" src="./admin/resources/images/<?php echo $pet->hinh ?>" alt="" /></a>
                        <hr>
                        <h3><?php echo $pet->tenpet ?></h3>
                        <hr>
                        <i class="fas fa-h2">Gi???i t??nh: <?php echo $pet->gioitinh ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Tu???i: <?php echo $pet->tuoi ?></i>
                        <div class="text"><hr></div>
                        <i class="fas fa-h2">Ti??m ph??ng: <?php if($pet->tiemphong==0){echo "Ch??a r??";} else{echo "C??";} ?></i>
                        <br><br>
                        <a class="btn btn-secondary" href="nhannuoi-single.html?mapet=<?php echo $pet->mapet?>" target="_blank" rel="noreferrer" aria-label="Nh???n nu??i" aria-labelledby="Nh???n nu??i">Nh???n nu??i</a>
                    </li>
                    <?php
                }
        ?>
        </ul>
    </section>
    <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
            <?php 
            for($i=0;$i<=$totalpage;$i++){
                ?>
                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="?per_page=8&page=<?php echo$i+1 ?>" tabindex="-1"><?php echo $i+1 ?></a>
                <?php
            }
            ?>
        </ul>
    </div>
    
</section>