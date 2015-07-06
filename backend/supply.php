<html>
<?php
$tblno=$_REQUEST["tn"];
$t=$_REQUEST["t"];
$m = new MongoClient();
$db = $m->SmartWaiterDb;
$collection = $db->Order;




$collection->update(array("table"=>$tblno),array('$push' => array('$set'=>array("Seen"=>"YES"))));
$collection->update(array("table"=>$tblno),array('$push' => array('$set'=>array("food"=>"[]"))));

echo $tblno."	Order palced Success fully";

?>
</html>
