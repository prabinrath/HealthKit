<?php 
session_start();
$devid = $_POST['device_id'];

if(isset($_SESSION['device_id']) || isset($_SESSION['pname']))
{
		unset($_SESSON['pname']);
		unset($_SESSION["device_id"]);
}
$_SESSION['device_id'] = $devid;

 if($_SESSION['device_id']  != " " )
    echo "success";
else
    echo "failure"; 


?>
