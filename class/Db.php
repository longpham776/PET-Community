<?php
    class Db{
        protected static $pdo;
        function __construct(){
            self::$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, PASSWD);
            self::$pdo->query("set names utf8");
        }
        protected function selectQuery($query, $condition=[]){
            $stm= self::$pdo->prepare($query);
            $stm->execute($condition);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        protected function updateQuery($query, $condition=[]){
            $stm= self::$pdo->prepare($query);
            $stm->execute($condition);
            return $stm->rowCount();
        }
        protected function deleteQuery($query, $condition){
            $stm= self::$pdo->prepare($query);
            $stm->execute($condition);
            return $stm->rowCount();
        }
        protected function insertQuery($query, $condition=[]){
            $stm= self::$pdo->prepare($query);
            $stm->execute($condition);
            return $stm->rowCount();
        }
    }
?>