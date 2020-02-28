<?php
//  *************** For PostgreSQL
    $dsn = "pgsql:host=localhost;dbname=login_course;port=5432";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];
    $pdo = new PDO($dsn, 'postgres', 'express', $opt);
    echo "Connected To Database";
//  *************** For MySQL
//    $dsn = "mysql:host=localhost;dbname=login_course;port=3306;charset=utf8";
//    $opt = [
//        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_EMULATE_PREPARES   => false
//    ];
//    $pdo = new PDO($dsn, $user, $pass, $opt);
?>