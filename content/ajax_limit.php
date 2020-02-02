<?php
error_reporting(0);
include_once('../config/config.php');
include_once('../lib/meekrodb.2.3.class.php');
include_once('../functions/global.php');
$id = $_POST['ids'];
$limit = $_POST['limit'];
if($_POST['limit'] <= 50000){
limit($id,$limit);
} else {    
echo '<font color="red">przekroczony limit</font>';    
}


?>