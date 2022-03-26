<?php
    $action = Utilities::get("action", "index");
    switch ($action) {
        case 'index':
            include "./models/pet.php";
            $dataPet= getAllSach();
            include "./views/sach/index.php";
            break;
        case 'edit':
            include "./models/loaisach.php";
            include './models/NhaXB.php';
            include './models/sach.php';
            $dataSachById=getSachById(Utilities::get("masach"));
            include './views/sach/edit.php';
            break;
        case 'update': 
            include "./models/sach.php";
            updateSach($dataSach);
            $dataSach= getAllSach();
            include "./views/sach/index.php";
            break;
        case 'delete':
            include './models/sach.php';
            $id= Utilities::get("masach");
            deleteSach($id);
            $dataSach=getAllSach();
            include './views/sach/index.php';
            break;
        case "add":
            include './models/loaisach.php';
            include './models/NhaXB.php';
            include './views/sach/add.php';
            break;
        case 'addNew':
            $masach=Utilities::post("masach");
            $tensach= Utilities::post("tensach");
            $mota= Utilities::post("mota");
            $gia= Utilities::post("giasach");
            $hinh= Utilities::post("hinh");
            $loaisach= Utilities::post("loaisach");
            $nxb= Utilities::post("nhaxb");
            $tenhinh= " ";
            if($hinh!=""){
                if($hinh["error"]==0){
                    $tenhinh= $hinh["name"];
                    move_uploaded_file($hinh["tmp_name"], "./resources/images/products/$tenhinh");
                }
            }
            echo $masach;
            include "./models/sach.php";
            addSach([$masach,$tensach, $mota, $gia, $loaisach, $nxb, $hinh]);
            $dataSach= getAllSach();
            include "./views/sach/index.php";
            break;
        case "filter":
            $keyword= Utilities::post("keyword");
            include './models/sach.php';
            $dataSach=getByKeyword($keyword);
            include './views/sach/index.php';
            break;
        case "search":
            $kw= Utilities::post("kw");
            include './models/sach.php';
            $dataSach=getBySearch($kw);
            include './views/sach/index.php';
            break;
        default:
            # code...
            break;
    }
?>