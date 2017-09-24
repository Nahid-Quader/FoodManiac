<?php
mysql_connect('localhost','root','');
mysql_select_db("foodmaniac");
error_reporting(~E_ALL ^ ~E_NOTICE);
session_start();
$userkey=$_SESSION['userkey'];
echo $userkey;
foreach ($_POST as $key => $value)

?>