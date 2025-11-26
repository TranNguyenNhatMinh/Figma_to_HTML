<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'your_database';

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn -> connect_error){
        die('ket noi that bai : '.$conn->connect_error);
    }

    $conn->set_charset('utf8');
?>