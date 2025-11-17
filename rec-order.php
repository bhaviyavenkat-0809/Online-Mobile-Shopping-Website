
<!DOCTYPE html>
<html lang="en">
<head><title>MOBILE PARADISE</title>
<meta charset="UTF-8"/>
	<meta name ="author" content="V.Bhaviya(2020115021)"/>
	<meta http-equiv="refresh" content="45">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
	<link rel="shortcut icon"  href="images/mobstore.png">
	<link rel="stylesheet" href="../css/icestyle.css">


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
li a.nav11 {
        display:block;
        text-align:center;
        padding:12px 12px;
        text-decoration:none;
		top:50px;
		background-color:#e7feff;
		color:#008080;
		font-size:20px;
		font-weight:bold;
	    
		
}
ul.l11{
	list-style-type:none;
    margin-left:25px;
	margin-top:5px;
	padding:0;
	width:150px;
	overflow:hidden;
}
ul.l12{
	list-style-type:none;
    margin-left:650px;
	margin-top:-5px;
	padding:0;
	width:250px;
	overflow:hidden;
}
li a.nav1 {
        display:block;
        text-align:center;
        padding:12px 12px;
        text-decoration:none;
		top:50px;
	
		font-weight:bold; 
		background-color:#e7feff;
		font-size:20px;
	    
}
h2.cent{
	margin-top:-255px;
	text-align:center;
}
h2.cent1{
	text-align:center;
	margin-top:-18px;
}
img.imga
{
margin:70px 170px 0px;


}

</style>
</head>

<header>
<img src="images/mobstore.png" alt="ms" width="80" height="80"> <h1 class="title">MOBILE PARADISE</h1>
	
</header>
<hr>
<img src="images/pop3.png" class="imga" alt="p1" width="260" height="250">

<?php
session_start();
include "connectionn.php"; // Using database connection file here
include "function.php";

$user_data=chklogin($con);
if(isset($_POST['confirmorder']))
{
    $sql="insert into orders(user_id) values('$user_data[id]')";
	$res=pg_query($con,$sql);
	if(!$res)
		echo"<script>
	alert('oo');
	</script>";
	$sql2="select order_id from orders";
	$res2=pg_query($con,$sql2);
	while($row=pg_fetch_array($res2)){
		$i=$row['order_id'];
	}
    $name = $_POST['Name'];
    $email = $_POST['Email'];
	$phno = $_POST['Phno'];
	$address = $_POST['Address'];
	$total = $_POST['Total'];
	$curDate= date("Y-m-d");
	$deli=date('Y-m-d',strtotime($curDate.' +5 days '));
	if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $k=>$value)
	{	

    $sql1 = "insert into cus_record(name,email,phno,address,total,model_name,quantity,price,order_id,user_id,dateof,delivery_date)values('$name','$email','$phno','$address','$total','$value[Item_Name]','$value[Quantity]','$value[Price]','$i','$user_data[id]','$curDate','$deli')";
	$res4=pg_query($con,$sql1);
	if(!$res4){
		echo 'not inserted';
	}
	}}
	$sql3="delete from orders where user_id='$user_data[id]'";
	$res3=pg_query($con,$sql3);
	 echo "<h2 class='cent'>Your Order has been placed successfully!<br>Order Number ".$i."<br> Will be delivered by</h2><br>";
	 $Date=date("Y-m-d");
	 echo"<h2 class='cent1'>".date('Y-m-d',strtotime($Date.' +5 days '))."</h2><br>";
	 echo"<ul class='l12'><li class='nav11'><a href='index.html' class='nav11'>Go To Homepage</a></li></ul>";
	 foreach($_SESSION['cart'] as $k=>$value){
		 $sqlu="update mobilephones set stock=stock-'$value[Quantity]' where model_name='$value[Item_Name]'";
		 $resu=pg_query($con,$sqlu);
	 }
	 unset($_SESSION['cart']);
}
	// $_SESSION['tcart']=0;)
	 
	
    /*$insert = pg_query($con,$query);

    if(!$insert)
    {
        echo pg_error();
    }
    else
    {
        echo "<h2>Your Order has been placed successfully!</h2><br>
        <ul class='l11'><li class='nav1'><a  href='reasons.html' class='nav1'>Cancel Order</a></li></ul><br><br>
		<ul class='l12'><li class='nav11'><a href='index.html' class='nav11'>Go Back</a></li></ul>";
    }
}
}

//pg_close($conn); // Close connection*/
	
?>


