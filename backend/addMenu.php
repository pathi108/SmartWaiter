<!DOCTYPE HTML>
<html> 
<head>
<script>
function loadXMLDoc(action)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  	console.log(action);
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
    	console.log('response');
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
  var item=document.getElementById("menu").value;
  console.log("HI"+item)
xmlhttp.open("GET","db.php?item="+item+"&action="+action,true);
xmlhttp.send();
}
</script>
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body class="container">
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
  <h1 align="center">Edit Menu</h1>
</div>
<p align="center"><b>Enter new Menu Item to add</b></p>
<div class class="container" >
<form>
<div class class="container" >
<div class="form-group">
  <label>
Menu Item: 
</label>
<input type="text" id="menu" class='form-control'>
<button type="button" onclick="loadXMLDoc('Menu')" class='btn btn-success'>Add Catogery</button>
</div>
<div class class="container" >
</form>
<p align="center"><b>Add new Food Item</b></p>
<form action="insert.php" method="post">
<div class class="container" >
<div class="form-group">

<b>Menu Type: </b><input type="text" name="Catagry" class='form-control'>
<b>Name:</b>     <input type="text" name="name" class='form-control'>
<b>Small:</b>    <input type="text" name="Small" class='form-control'>
<b>Regular:</b>  <input type="text" name="Regular" class='form-control'>
<b>Large:</b>    <input type="text" name="Large" class='form-control'>
<br>
<label>
<input type="text" name="op1" class='form-control'><input type="text" name="val1" class='form-control'>
</label>
<label>
<input type="text" name="op2" class='form-control'><input type="text" name="val2" class='form-control'>
</label>
<label>
<input type="text" name="op3" class='form-control'><input type="text" name="val3" class='form-control'>
</label>
<label>
<input type="text" name="op4" class='form-control'><input type="text" name="val4" class='form-control'>
</label>
<label>
<input type="text" name="op5" class='form-control'><input type="text" name="val5" class='form-control'>
</label>
<input type="submit" class='btn btn-success'>
</div>
</div>

</form>
</div>


<p id="myDiv" class="alert alert-success"></p>
</body>
</html>