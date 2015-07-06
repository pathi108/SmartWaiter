<html>
<head>
<script>
function loadXMLDoc(id,menu)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	//console.log(action);
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	console.log('Event ocar');
    	console.log(xmlhttp.responseText);
    document.getElementById("Dis").innerHTML=xmlhttp.responseText;
    }
  }
 
xmlhttp.open("GET","dis.php?item="+id+"&menu="+menu,true);
xmlhttp.send();
}
function Order()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	//console.log(action);
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	console.log('Event ocar');
    	console.log(xmlhttp.responseText);
    document.getElementById("myDiv").innerHTML="<b>"+xmlhttp.responseText+"</b>";
    }
  }
  console.log("hari thana");
  var item=document.getElementById("name").value;
  var size=document.getElementById("size").value;
  var amount=document.getElementById("ammount").value;
xmlhttp.open("GET","Order.php?item="+item+"&size="+size+"&ammount="+amount+"&tn=2",true);
xmlhttp.send();
}
function SubOrder()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    //console.log(action);
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      console.log('Event ocar');
      console.log(xmlhttp.responseText);
    document.getElementById("myDiv").innerHTML="<b>"+xmlhttp.responseText+"</b>";
    }
  }
  console.log("hari thana");
xmlhttp.open("GET","finish.php?tn=2",true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    	<p class="navbar-text navbar-left">Home</p>
    	<div class="navbar-form navbar-right">
    	<button type="button" class='btn btn-success' onclick="SubOrder()">Place Order</button>
       </div> 
  </div>
</div>
</nav>
<div class="page-header">
  <h1 align="center">Main Menu</h1>
</div>
<div align="center" class="row">
<div div class='col-xs-2'>
</div>
<div div class='col-xs-8'>
<?php
$m = new MongoClient(); 
$db = $m->SmartWaiterDb; 
$collections=$db->listCollections();
//var_dump($collections);
foreach ($collections as $collection) {
	$MenuItem=explode('.',$collection);
	echo "<div class=\"panel panel-default\">";
	echo "<p class=\"panel-heading\">".$MenuItem[1]."</p>";
  if($$MenuItem[1]!="Order"){
	$collection = $db->$MenuItem[1]; //select collection
	$cursor = $collection->find();
	echo "<div class=\"panel-body\">";
	echo "<table class=\"table\">";
	echo "<tr class=\"row\">";
	echo "<td class=\"col-xs-3\">";
	echo "Name";
	echo "</td>";
	echo "<td class=\"col-xs-3\">";
	echo "Small";
	echo "</td>";
	echo "<td class=\"col-xs-3\">";
	echo "Regular";
	echo "</td>";
	echo "<td class=\"col-xs-3\">";
	echo "large";
	echo "</td>";
	echo "</tr>";
	foreach ($cursor as $food)
    {
    	//var_dump($food);
    	echo "<tr class=\"row\">";
    	echo "<td class=\"col-xs-3\"><a href=\"#\" onclick=\"loadXMLDoc('".$food['Name']."','".$MenuItem[1]."')\">".$food['Name']."</td>	<td class=\"col-xs-3\">".$food['small']."</td><td class=\"col-xs-3\">	".$food['regular']."</td><td class=\"col-xs-3\">	".$food['large']."</td>";
    	echo "</tr>";
		
	}
	
echo "</table>";
echo "</div>";
echo "</div>";
	
	}
}
?>
</div>
<div class='col-xs-2'>
<div class="jumbotron">
<p id= "Dis" align="left"></p>
<form>
<div class class="container" >
<div class="form-group">
<label>
Name : 
</label>
<input type="text" id="name" class='form-control' align="center">
  <label>
ammount : 
</label>
<input type="text" id="ammount" class='form-control' align="center">
<label>
Size : 
</label>
<input type="text" id="size" class='form-control' align="center">
<button action="Order.php" method="post" class='btn btn-success' onclick="Order()" >Add Food</button>
</div>
<div class class="container" >
</form>
</div>
</div>
<p id="myDiv" class="alert alert-success"></p>
</body>
</html>

