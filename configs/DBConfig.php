<?php

define("DNS", "mysql:host=localhost;dbname=karaje_man;charset=utf8mb4");

define("DB_USER", "root");

define("DB_PASS", "");

$db = new PDO(DNS, DB_USER, DB_PASS);
?>