<?php
const DB_HOST = 'sebastianfrank.dk.mysql';
const DB_USER = 'sebastianfrank_';
const DB_PASS = 'YdztW2q6';
const DB_NAME = 'sebastianfrank_';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset("utf8"); 
?>