<html>
<head>
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
body{
margin:0;
padding:0;
background-color:rgb(0,191,255);
}
.head{
text-align:center;
color:rgb(2555,0,64);
}
.input2{
text-align:center;
text-color:blue;
border_radius:2px;}
</style>
</head>
<body>
<div class="head">
<h1>Welcome Our Dear Customer:</h1>
<h2>Here Your Account Details:</h2>
</div>
<table>
<tr>
<th>Name</th>
<th>Account_No</th>
<th>Balance</th>
<th>Email</th>
<th>Mob_No</th>
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
$cust=$_GET["Account"];
echo"<center>";
$result=mysqli_query($conn,"select Id,Acc_No,Balance,Email,Mob_No from customer where Acc_No=$cust");
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo"<td>".$row['Id']." </td><td> ".$row['Acc_No']." </td><td> ".$row['Balance']." </td><td> ".$row['Email']." </td><td> ".$row['Mob_No']." </td>";
echo"</tr>";
}
}
?>
</table>
<br>
<br>
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
$result=$_GET["Account"];
echo"<h1>";
echo"Here List Of Customer with You can do transaction..";
echo"</h1>";
$transadry=mysqli_query($conn,"SELECT Id,Acc_No FROM customer WHERE NOT (Acc_No=$result)");
if(mysqli_num_rows($transadry)>0){
while($row=mysqli_fetch_array($transadry)){
echo"<tr>";
echo"<td>".$row['Id']." </td><td> ".$row['Acc_No']." </td>";
echo"</tr>";
}
}
?>
</table>
<br>
<br>
<br>
<div class="input2">
<form method="get" action="reciept.php">
<input type="text" name="transadry" placeholder="Enter transadry Acoount No..">
<input type="text" name="balance" placeholder="Enter Amount...">
<input type="text" name="sender" placeholder="Enter Sender Acoount No..">
<br>
<br>
<input type="submit">
</div>
</body>
</html>