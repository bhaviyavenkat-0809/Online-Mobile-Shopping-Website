<!DOCTYPE html>
<html lang="en">
<head> 
    <title>MOBILE PARADISE</title>
	<meta charset="UTF-8"/>
	<meta name ="author" content="V.Bhaviya(2020115021)"/>
	<meta http-equiv="refresh" content="45">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
	<link rel="shortcut icon"  href="images/mobstore.png">
	<link rel="stylesheet" href="css/icestyle.css">
</head>
<style>
h1.title
{
    font-family:"Times New Roman";
	font-size:50px;
	text-align:left;
	color:#006666;
	margin-top:-80px;
	margin-left:100px;
	
}

li a {
        display:block;
        text-align:center;
        padding:10px 20px 0 0px ;
        text-decoration:none;
		top:50px;
		background-color:#029c9c;
		color:white;
		font-size:20px;
		font-weight:900;
	
		
}

ul {
	list-style-type:none;
    background-color:#029c9c;
	overflow:hidden;
	width: 100%;
	margin:0 -7px;
	padding:0 290px;
}
.nav{
 background-color:#029c9c;
		}


li a:hover:not(.active) {
  background-color: #019191;
}
.active{
        background-color:#029c9c;
		
}
li{
float:left;
}
footer.font{
	color:#006161;
}
p.nb{
color:#006161;
}
p.right{
color:#006161;}
a:hover.foot
	{
	color: #008080;
	
	}
.contentt{
line-height:20px;
margin:40px 410px;
width:700px;
}
th,td{
	border:none;
	font-size:18px;
}

	.row {
  display: flex;
}

.column {
  flex: 33.33%;
  padding: 5px;
  margin:0px 50px 30px;
}
.btn{
background-color:red;
color:white;
border:none;
width:90px;
font-size:18px;
height:30px;
margin-left:290px;

}
p.right{
color:#006161;
}
p.pr{
	font-size18px;
}
.nav11{
	color:#006666;
	font-size:20;
	font-weight:bold;
}


</style>
<body>
<header>
<img src="images/mobstore.png" alt="ms" width="80" height="80"> <h1 class="title">MOBILE PARADISE</h1>


</header>
<ul>
    <li class="nav"> <a class="nav" href="index.html">HOME</a></li>
	<li class="nav"><a class="nav" href=" products/specs.html">SPECIFICATIONS</a></li>
	
	<li class="nav"><a class="nav"  href="order.php">ORDER </a></li>
	<li class="nav"><a class="nav" href="mycart.php">CART</a></li>
	<li class="nav"><a class="active" href="cancell.php">YOUR ORDERS</a></li>
	
	<li class="nav"><a class="nav" href="about.html">WHY US</a></li>
	<li class="nav"><a class="nav" href="contact.html">CONTACT</a></li>
	
	
</ul> 



<?php
session_start();
include "connectionn.php"; 
include "function.php";


$user_data=chklogin($con);

$curDate= date("Y-m-d");
function dateCompare($Depart,$Current){
	$date1=date("Y-m-d",strtotime($Depart));
	//date1=$depart
	$date2=$Current;
	
	$datetime1=date_create($date2);
	$datetime2=date_create($date1);
	//calculate the difference between date time objects
	$interval=date_diff($datetime1,$datetime2);
	//printing result in days format
	$days1=$interval->d;
	if($days1<=2)
		return 1;
	else
		return 0;
}
$count=0;
$user_data=chklogin($con);
$sql="Select distinct(order_id)from cus_record where user_id=$user_data[id] order by order_id desc";
$res=pg_query($con,$sql);
if(!$res)
	echo"<h1>No Cancellation</h1>";
while($r1=pg_fetch_array($res)){
	$r=0;
	$sql33="select total,dateof,order_id,model_name,quantity from cus_record where order_id='$r1[order_id]'";
	$res2=pg_query($con,$sql33);
	
	while($r2=pg_fetch_array($res2)){
		$res1=dateCompare($r2["dateof"],$curDate);
		$d=$r2["dateof"];
		if($res1==1){
			$count++;
			if($r==0)
				echo"<table class='contentt' cellspacing='10' cellpadding='10' border='2'>";
			echo"<tr style='border-bottom:1px solid black;'>";
			echo"<th>ITEMS</th><th>QUANTITY</th></tr>";
		$i=$r2["order_id"];
		$t=$r2["total"];
		echo "<tr><td>ORDER ID: ".$r2["order_id"]."</tr></td>"."<td> ".$r2["model_name"]."</td><td>".$r2["quantity"];$r++;}
	else continue;}
	
	
if($res1==1)
{   
	echo"<tr><td>DELIVERY DATE: ".date('Y-m-d',strtotime($d.'+5days'))."</td></tr>"."<tr><td> TOTAL: ".$t."</td></tr>";
	echo"<tr><td> <form action='cancelconf.php' method='post'><input type='hidden' name='oid' value='$i'>
        <button name='cancel' class='btn' id='demo' onclick='myFunction()'>Cancel</button></form></td></tr>";

}

echo"</table>";
}

if($count==0)
	echo"<h1 class='cancel'>No Orders Available for Cancellation</h1>";
?>
<h2>*Cancellation can be done only within two days of ordering</h2>
<script>
function myFunction(){
	let text="Are you sure you want to cancel your order";
	if(confirm(text)==true){
		window.location.href='cancelconf.php';
	}else{
		return false;
	}
	
}
</script>

<hr>
<footer>


<p class="right">
  &copy; Copyright 2022 Mobile Paradise</p>


</footer>

</body>
</html>