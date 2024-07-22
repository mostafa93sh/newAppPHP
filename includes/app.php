<?php
$databaseInfo= require_once __DIR__.'/../config/database-info.php';
$conn = mysqli_connect('localhost','root','');
if(!$conn){
    echo 'Something went wrong';
}else{
    echo 'connected to database successfully';
}

require_once 'helper.php';

mysqli_close($conn);