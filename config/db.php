<?php

class Database{
    public  static function connect(){
        $db = new mysqli('localhost', 'root', '', 'recursoshumanos');
        $db->query("SET NAMES 'uft8'");
        return $db;
    }
}