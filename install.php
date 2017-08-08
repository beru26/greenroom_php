<?php
    $dbhost = 'localhost:3036';
    $dbuser = 'root';
    $dbpass = 'rootpassword';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);

    if(! $conn) {
        die('Connection failed! '.mysql_error());
    }
    echo 'Connection successfull';

    $sql = 'CREATE Database tractors_db';
    $retval = mysql_db_query( $sql, $conn );

    if(! $retval) {
        die('Could not create database: ' .mysql_error());
    }
    echo 'Database created successfully.';
    mysql_close($conn);
?>
