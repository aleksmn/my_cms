<?php

$db['DB_HOST'] = 'localhost';
$db['DB_USER'] = 'root';
$db['DB_PASS'] = '';
$db['DB_NAME'] = 'cms';

// Назначение констант
foreach($db as $key => $value){
    define($key, $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Для отображения кириллицы:
mysqli_query($connection, "SET NAMES utf8");

if(!$connection){
    die("Database connection failed: " . mysqli_connect_error());
} 
