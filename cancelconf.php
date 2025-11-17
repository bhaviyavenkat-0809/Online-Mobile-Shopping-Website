
<!DOCTYPE html>
<html lang="en">
<head> 
    <title>MOBILE PARADISE</title>
	<meta charset="UTF-8"/>
	<meta name ="author" content="V.Bhaviya(2020115021)"/>
	<meta http-equiv="refresh" content="45">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
	<link rel="shortcut icon"  href="images/mobstore.png">
	<link rel="stylesheet" href="../css/icestyle.css">
	<style>
	ul.l11{
	list-style-type:none;
    margin-left:20px;
	width:160px;
	padding:0;
	overflow:hidden;
    }
     li a.nav1 {
        display:block;
        text-align:center;
        padding:12px 12px;
        text-decoration:none;
		top:50px;
		font-weight:bold;
		color:#008080;
		background-color:#F0FFFF;
		font-size:20px;
	    
    }
	h1.title
{
    font-family:"Times New Roman";
	font-size:50px;
	text-align:left;
	color:#006666;
	margin-top:-80px;
	margin-left:100px;
	
}
	</style>
</head>

<header>
<img src="images/mobstore.png" alt="ms" width="80" height="80"> <h1 class="title">MOBILE PARADISE</h1>
</header>
<hr>

<?php
session_start();
include ("connectionn.php"); 
include("function.php");


if(isset($_POST['cancel'])){

	$i=$_POST['oid'];
	$sql4="select * from cus_record where order_id='$i'";
	$res4=pg_query($con,$sql4);
	while($r4=pg_fetch_array($res4))
	{
	$ill=$r4["quantity"];
	$sql="update mobilephones set stock=stock+$ill where model_name='$r4[model_name]'";
	$res=pg_query($con,$sql);
	$sqlin="insert into cancelled (name,total,model_name,quantity,price,order_id,user_id,dateof) values('$r4[name]','$r4[total]','$r4[model_name]','$r4[quantity]','$r4[price]','$r4[order_id]','$r4[user_id]','$r4[dateof]')";
	$resin=pg_query($con,$sqlin);
	}
	$sql3="delete from cus_record where order_id='$i'";
	$res3=pg_query($con,$sql3);
	if($res3){
		echo"<script>alert('Your Order has been cancelled!')
      window.location.href='cancell.php'</script>";
	}


}
?>
</html>