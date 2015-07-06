<html>
<head>
<script>
function Order(tblno)
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
 
xmlhttp.open("GET","supply.php?tn="+tblno+"&t=4",true);
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
       </div> 
  </div>
</div>
</nav>
<div class="page-header">
  <h1 align="center">Kitchen</h1>
</div>
<div align="center" class="row">
<div div class='col-xs-12'>
<?php
$m = new MongoClient(); 
$db = $m->SmartWaiterDb; 
$collection = $db->Order;
//var_dump($collections);
$cursor = $collection->find();

foreach ($cursor as $table) {
 echo "<div class=\"container\">";
  echo "<div class=\"panel panel-default\">";
  echo "<p class=\"panel-heading\">".$table['table']."</p>";
   echo"<div class=\"panel-body\">";
  echo "Order Finished : ".$table['status']."<br/>";
  echo "Show : ".$table['Seen']."<br/>";
  echo "food"."<br/>";
  foreach($table['food'] as $f)
  {
    echo $f."<br/>";
  }
  echo "<button  method=\"post\" class='btn btn-success' onclick=\"Order('".$table['table']."')\" >Finish Order</button>";
echo "<p id= \"Dis\" align=\"left\"></p>";
echo "</div></div></div>";

  }
  
?>
</div>
</div>
</body>
</html>

