<?php


    $dsn = 'mysql:host=mariadb;dbname=videgrenierenligne;charset=utf8';
    $db = new PDO($dsn, 'webapplication', '653rag9T');
    
    // Throw an Exception when an error occurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>