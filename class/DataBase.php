<?php
class DataBase{
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'adote_pet';
        $this->user = 'root';
        $this->pass = '';
    }
    public function connection(){
        return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
    }
}