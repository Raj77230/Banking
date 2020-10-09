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
</style>
</head>
<body>
<h1>Here Transadry Balance Details...</h1>
<table>
<tr>
<th>Name</th>
<th>Account</th>
<th>Balance</th>
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
$account=$_GET["transadry"];
$balance=$_GET["balance"];
$cust=$_GET["sender"];
$result=mysqli_query($conn,"select Id,Acc_No ,Balance+$balance as NewBalance from customer where(Acc_No=$account)");
echo"<center>";
echo"<hr/>";
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo"<td>".$row['Id']." </td><td> ".$row['Acc_No']." </td><td> ".$row['NewBalance']." </td>";
echo"</tr>";
}
}
echo"<br><br><br>";
$result=mysqli_query($conn,"select Id,Acc_No ,Balance-$balance as NewBalance from customer where(Acc_No=$cust)");
echo"<center>";
echo"<hr/>";
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo"<td>".$row['Id']." </td><td> ".$row['Acc_No']." </td><td> ".$row['NewBalance']." </td>";
echo"</tr>";
}
}
?>
</table>
<h1>Here Sender Balance Details...<h1>
</body>
</html>