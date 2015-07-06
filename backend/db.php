<html>
<?php

$item = $_REQUEST["item"];
$action=$_REQUEST["action"];
$m = new MongoClient();
$db = $m->SmartWaiterDb;

if($action=="Menu")
{
$collection = $db->createCollection($item);
echo $item." added successfully";
}


?>
</html>