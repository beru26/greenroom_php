<?php
    $dsn = 'mysql:dbname=greenroom;host=127.0.0.1';
    $user = 'root';
    $password = 'podberbog';

    /* Connect to a MySQL database using driver invocation */
    try {
        $conn = new PDO($dsn, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
