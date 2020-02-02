<?php
session_start();
error_reporting(0);
include_once('./config/config.php');
include_once('./lib/meekrodb.2.3.class.php');
include_once('./functions/global.php'); 

    $searchVal = $_POST['username'];
    try {
        $result = sql_q('logowanie');    

        if($result>0) {
            $valid = "true";
        } else {
            $valid = "false";
        }

        $dbh = null;

        echo $value;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }       
?>