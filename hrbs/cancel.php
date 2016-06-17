<?php
require_once('connection/dbFunction.php');
$function_object=new dbFunction();

$user_id = $_GET['id'];
$delete_room_inventory=$function_object->delete_room_inventory($user_id);
header('location:user_panel.php');
exit();
mysql_close($con);
?>