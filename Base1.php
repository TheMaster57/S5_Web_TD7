<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Base1 {

    public function __construct() {
        
    }

    public static function getConnection() {
        try {
            $ini_array = parse_ini_file("configbdd.ini");
            $dsn= $ini_array['driver'] . ":host=" . $ini_array['host'] . ";dbname=" . $ini_array['dbname'];
            $bdd = new PDO($dsn, $ini_array['user'], $ini_array['pass']);
            return $bdd;
        } catch (Exception $e) {
            throw new BaseException("connection: $dsn ".$e->getMessage(). '<br/>');
        }
    }

}