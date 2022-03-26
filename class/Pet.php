<?php
    class Sach extends Db{
        public function getAll(){
            return $this->selectQuery("select * from pet");
        }
        public function getById($id){
            return $this->selectQuery("select * from pet where mapet=?",[$id]);
        }
        public function getByLoai($idLoai){
            return $this->selectQuery("select * from pet where maloai=?", [$idLoai]);
        }
        public function deleteById($id){
            return $this->deleteQuery("delete from pet where mapet=?", [$id]);
        }
        public function update($id, $value){
            return $this->updateQuery("update pet set tenpet=?,gioitinh=?,tuoi=?,tiemphong=?,maloai=?,hinh=?  where mapet=? ",[$value["tenpet"], $value["gioitinh"], $value["tuoi"], $value["tiemphong"], $value["maloai"], $value["hinh"], $id]);
        }
        public function insert($value=[]){
            return $this->insertQuery("insert into pet(tensach, gioitinh, tuoi, tiemphong, maloai, hinh) values(?,?,?,?,?,?)",$value);
        }
        public function getSearch($kw){
            return $this->selectQuery("select * from pet where tenpet like ? ",[$kw]);
        }
    }
?>