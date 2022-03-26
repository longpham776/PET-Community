<?php
    $objPet= new Pet();
    $dataPet= $objPet->getAll();
    function getPetById($id){
        $objPet= new Pet();
        return $objPet->getById($id);
    }
    function updatePet($dataPet){
        $objPet= new Pet();
        $dataPet= $objPet->getAll();
        $mapet= Utilities::post("mapet");
        if($mapet!=""){
            $tensach=Utilities::post("tenpet");
            $gioitinh=Utilities::post("gioitinh");
            $tuoi=Utilities::post("tuoi");
            $tiemphong=Utilities::post("tiemphong");
            $maloai=Utilities::post("maloai");
            $filehinh=Utilities::post("hinh");
            $tenHinh="";
            if($filehinh!=""){
                if($filehinh["error"]==0){
                    $tenHinh= $filehinh["name"];
                    move_uploaded_file($filehinh['tmp_name'], "./assets/img/$tenHinh");
                }
            }
            if($tenHinh==""){
                foreach($dataPet as $pet){
                    if($pet["mapet"]== $mapet){
                        $tenHinh= $pet["hinh"];
                    }
                }
                
            }
            $value = ["tenpet"=>$tenpet, "gioitinh"=>$gioitinh, "tuoi"=>$tuoi, "tiemphong"=>$tiemphong,"maloai"=>$maloai, "hinh"=>$tenHinh];
            $objPet->update($mapet, $value);
        }
    }
    function getAllPet(){
        $objPet= new Pet();
        $dataPet= $objPet->getAll();
        return $dataPet;
    }
    function deletePet($id){
        $objPet= new Pet();
        $row= $objPet->deleteById($id);
        return $row;
    }
    function addPet($value){
        
        $objPet= new Pet();
        $row= $objPet->insert($value);
        return $row;
    }
    function getByKeyword($keyword){
        $objPet= new Pet();
        return $objPet->getByKeyword($keyword);
    }
    function getBySearch($kw){
        $objPet= new Pet();
        return $objPet->getSearch($kw);
    }
?>