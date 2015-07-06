
<?php
$tblno=$_REQUEST["tn"];
$m = new MongoClient();
$db = $m->SmartWaiterDb;
$collection = $db->Order;




$collection->update(array("table"=>$tblno),array('$push' => array('$set'=>array("status"=>"YES"))));
echo $tblno."	Order palced Success fully";

?>
