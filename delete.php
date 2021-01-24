<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('usuarios',array('id'=>$_REQUEST['delId']));
	header('location: home.php?msg=rds');
	exit;
}
?>