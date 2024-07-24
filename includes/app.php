<?php
$databaseInfo = require_once __DIR__ . '/../config/database-info.php';
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (!$conn) {
    echo 'Something went wrong';
} else {
    echo 'connected to database successfully';
    echo '<br/>';
}

require_once 'helper.php';
