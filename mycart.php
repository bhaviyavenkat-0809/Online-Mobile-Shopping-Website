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
	<style>

	table, th, td{
	background-color:#F0FFFF;
	}
table{
	width:1100px;;
	margin:0px 170px 0px 215px;
	display: block;
	margin-left: 210px;
	margin-right: 340px;
	border-color:#800080;
	padding-top: 0.45em;
	padding-bottom: 0.625em;
	padding-left: 1em;
	padding-right: 1em;
	}
	
	input.tot
	{ 
	    border-color:#008080;
		border-radius: 2px;
		width:240px;
		height:35px;
		font-size:24px;
		line-height:20px;
		text-align:center;
		box-sizing: border-box;
	}
	label.font{
		font-size:28px;
		color:#008080;
		font-family:"Times New Roman";}
	form.ofo{
		width:650px;
		height:450px;
		margin:90px 40px;
		position:relative;
		}	
	h3.cart{margin:70px 80px 50px 45px;
		font-size:45px;
		font-family:"Times New Roman";
	    text-align:center;
	    color:#006666; }
	 li a {padding:10px 20px 0 10px ;top:50px;font-size:20px;
		font-weight:900;display:block;text-align:center;text-decoration:none;color:white;}
.btnr{
    margin-top: 1rem;
    display:inline-block;
    padding:4px 6px;
    border-radius: 3px;                   
	border-color:#e60000;font-size: 16px;
    cursor: pointer;font-weight: 500;
}
.img{
	height:150px;width:160px;}
fieldset
	{width:500px;
	display: block;
	margin-left: 455px;
	margin-right: 340px;
	border-color:#008080;
	padding-top: 0.45em;
	padding-bottom: 0.625em;
	padding-left: 1em;
	padding-right: 1em;
	}
	.btnc
	{
		background-color: #FFF;
		border-color:#e60000;

		width:100px;
		height:30px;
		font-size:20px;
		border-radius:3px;
		margin:25px 90px;

	}
	.btno{
		background-color: #fff;
		font-family:"Times New Roman";
		border-color:#008080;
		width:130px;
		height:40px;
		color:#008080;
		font-size:28px;
		border-radius:4px;
		margin:35px 105px;}
.btno1{
		background-color:#fff;
		border-color:#008080;
		border-radius:3px;
		width:220px;
		height:42px;
		font-size:22px;
}input{ border-color:#008080;
        border-radius: 5px;
		width:450px;
		height:35px;
		font-size:24px;
	    box-sizing: border-box;
	}
	p.order
	{ 
	font-size:20px;
	text-align:right;
	margin:0px 7px ;
	color:#008080;
	font-style:italic;
	font-weight:545;
	}
td{
	font-size:21px;
}

div.alg{
	text-align:center;
	font-size:25px;
	font-family : "verdana" ;
}
div.alg1{
	text-align:center;
	font-size:20px;
	font-family : "verdana" ;
}
div.col{
	line-height:100px;
	}
div.size{
	font-size:22px;
	line-height:45px;
	text-align:left;
	}
	th{
		font-size:20px;
		color:#008080;
	}
	h1.title{
    font-family:"Times New Roman";
	font-size:30px;
	text-align:left;
	color:#006666;
	margin-top:-50px;
	margin-left:70px;
}	
    
</style>
</head>
<header>
	<img src="images/mobstore.png" alt="ms" class="imgg" width="60" height="60"><h1 class="title"> MOBILE PARADISE</h1>
	
</header>
<body>

<ul class="menu">
    <li class="nav"> <a class="nav" href="index.html">HOME</a></li>
	<li class="nav"><a class="nav" href="products/specs.html">SPECIFICATIONS</a></li>

	<li class="nav"><a  class="nav" href=" order.php">ORDER</a></li>
	<li class="nav"><a class="active" href="mycart.php">CART</a></li>
	
	<li class="nav"><a class="nav" href="about.html">WHY US</a></li>
	<li class="nav"><a class="nav" href="contact.html">CONTACT</a></li>
</ul> 

<header>
	<h3 class="cart"> MY CART</h3>
	
</header>
<script>
      function booked()
	  {
        alert("Order placed");
	  }
    </script>
	<div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="mycart.php" class="fas fa-shopping-cart"><span></a>
 
    

    <?php
		session_start();//starting session

        if(!isset($_SESSION['cart']) or count($_SESSION['cart'])==0)
		{	//checking if cart is empty
            echo "<div class='alg'> Your Cart is empty now";  
            echo "<form action='order.php'>
                  <input type='submit' value='Order' class='btno'>
                  </form></div>";      
        }
        else
        {   echo "<table class='content1' cellspacing='15' cellpadding='10'>
                 
                  <tr>
                  <th>S.No</th>
                  <th>MODEL</th>
				  <th>MODEL NAME</th>
                  <th>PRICE</th>
                  <th>QUANTITY</th>
				  <th>TOTAL</th>
                  <th> </th>
                  </tr>
                
                  <body>";//printing the cart
                  $total=0;//calculating total cost
                  if (isset($_SESSION['cart']))
                  {
                    foreach($_SESSION['cart'] as $k => $value)
                    {
                      $cost=$value['Price']*$value['Quantity'];
                      $total=$total+$cost;
                      $sr=$k+1;
					  $conn=pg_connect("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123");
					  $sql="select * from mobilephones where model_name='$value[Item_Name]' limit 1";
								$res=pg_query($conn,$sql);
								while($row=pg_fetch_array($res))
								{	$i=$row['image'];
								}
								$_SESSION['tot']=$total;
                      echo "<tr>
                           <td>$sr</td>
						   <td><img src='$i' class='img'></td>
                           <td>$value[Item_Name]</td>
						   <td>Rs.$value[Price]</td>
						   <td>$value[Quantity]</td>
						   <td>Rs.$cost</td>
						   
                           
                           
                             <form action='manage_cart.php' method='post'>
							 <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
							 
							 
							
							 
                             <td>  <button name='Remove' class='btnr' >REMOVE</button></td>
                              
                             </form>
                               
                           </tr>
                            ";
					}
                  }
                           
                  echo "<br>" ; 
				 
                 echo "</body>
                       </table>
            
                       </div>
                

                      <form method='post' action=' '>
				        <br><br> 
					    <div class='alg1'>
                        <label class='font'>TOTAL : </label><input type='text' value='$total'class='tot'>
                        <br><div>";
                         
                        if (isset($_POST['Placeorder']))
				        {  
                          if (isset($_SESSION['cart']))
					      {
							echo "<br>" ; 
                            echo "<input type='submit' name='cancelorder' class='btnc' value='Cancel'>";  //cancel order comes once we click place order
                            echo "<hr>" ;
						  }
							
                          else
						  {
                            echo "<script>
                                  alert('Cart Empty');
                                    window.location.href='order.php';
                                  </script>";
                            }
                        }
						
                        elseif (isset($_POST['cancelorder'])){
                                echo "<input type='submit' name='Placeorder' value='Order' class='btno'>";
                            }
                        
                        else{
                            echo "<input type='submit' name='Placeorder' value=' Order' class='btno'>" ;
                        }
                    

                echo "</form>  
                    
                </div>            
			</div> " ;
			 }
            ?>
  
    <div class='alg1'>  
    <?php 
 
    if (isset($_POST['Placeorder']))
    {
        if (count($_SESSION['cart'])==0){
            echo "<script>
            alert('Cart Empty');
            </script>";

        }
		
    
      //form to fill while ordering

       echo "<form action='Rec-order.php' onsubmit='booked()' method='post' class='ofo'> 
		<fieldset>
		<legend>ORDER FORM</legend>
		<div class='size'>
        <label>Name : </label>
        <input type='text' name='Name' required ></div><br>
		<div class='size'>
        <label>E-Mail ID : </label>
        <input type='email' name='Email' required ></div><br>
		
      
        
		<div class='size'>
        <label>Phone No : </label>
        <input type='number' name='Phno' required ></div><br>
		
        
	    <div class='size'>
        <div><label>Address : </label></div>
        <textarea name='Address' rows='6' cols='58' required='required'></textarea>
        </div>
        <br>
		
		<div class='size'>
		<label>Credit Card No:</label>
        <input type='number' name='cno'></div><br>
		<div class='size'>
		<label>Expiry Date :</label>
        <input type='date' name='date'></div><br>
        
        <input type='hidden' name='Model_Name'>
        <input type='hidden' name='Total' value='$total'>
	
        
		
		<div class='col'>
        <input type='submit' name='confirmorder' value='Confirm Order' class='btno1'></div>
	
		<p class='order'>Cash on Delivery is available</p>
		</fieldset>
        ";
        
    
    }
    ?>
	</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
<footer>


<p class="right">
  &copy; Copyright 2022 Mobile Paradise</p>


</footer>

</body>
</html>
