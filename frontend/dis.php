<html>
<?php

$item = $_REQUEST["item"];
$menu = $_REQUEST["menu"];
$m = new MongoClient();
$db = $m->SmartWaiterDb;


$collection = $db->$menu;
$query =array('Name' =>$item);
$cursor = $collection->findOne($query);
$string="";

foreach ($cursor as $key => $value) {
	//$string=$string+"<br/>"+$key+" is "+$val;
	if($key!="_id"){
	echo $key." : ".$value."<br/>";
}
}
//echo $string;


?>
</html>