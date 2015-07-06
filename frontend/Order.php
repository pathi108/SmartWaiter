
<?php
$item = $_REQUEST["item"];
$size=$_REQUEST["size"];
$ammount=$_REQUEST["ammount"];
$tblno=$_REQUEST["tn"];
$m = new MongoClient();
$db = $m->SmartWaiterDb;
$collection = $db->Order;




$collection->update(array("table"=>$tblno),array('$push' => array("food" => $item.",".$size.",".$ammount)));;
echo $item."Order palced Success fully";

?>
