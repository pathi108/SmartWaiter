<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php

echo "Hi";
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

$m = new MongoClient();

$db = $m->SmartWaiterDb;

	
	
$collection = $db->$_POST["Catagry"];

	$document = array(
"Name" => $_POST["name"],
"small" => $_POST["Small"],
"regular" => $_POST["Regular"],
"large" => $_POST["Large"]


);

for($i=1;$i<5;$i++)
{

	if($_POST["op".$i]!="")
	{
		$document[$_POST["op".$i]] = $_POST["val".$i];
	}
		
}
//var_dump($document);
$collection->insert($document);
echo "<p class=\"alert alert-success\">Document inserted successfully</p>";
}
?>
</div>
</body>
</html>