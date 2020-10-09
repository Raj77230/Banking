<html>
<head>
<title>Banking</title>
<style type="text/css">
table{
border-collapse:collapse;
width:100%;
color:#c96459;
font-family:monospace;
font-size:25px;
text-align:left;
}
th{
background-color:#588c7e;
color:white;
}
.para{
text-align:center;
color:red;
font-size:30px;}
.input1{
text-align:center;
color:blue;
}
body{
margin:0;
padding:0;
background-color:rgb(0,191,255);
}
</style>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Account_No</th>
</tr>
<?php
$hostname="localhost";
$dbname="bank";
$username="root";
$password="";
$conn=mysqli_connect("$hostname","$username","","$dbname");
if(mysqli_connect_errno()){
echo"Failed to connect the database".mysqli_connect_error;
}
$result=mysqli_query($conn,"select * from customer");
echo"<center>";
echo"<h2>creating website for online banking using PHP</h2>";
echo"<h3>and using quiry method</h3>";
echo"<hr/>";
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo"<td>".$row['Id']." </td><td> ".$row['Acc_No']." </td><td> ";
echo"</tr>";
}
}
?>
</table>
<p class="para">Enter your account No.</p><br>
<form action="customer.php" method="get">
<div class="input1">
<input type="text"  name="Account" placeholder="Enter here...." align="center">
<input type="submit" align="center">
</div>
</form>
</body>
</html>