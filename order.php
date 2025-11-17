
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
.box
{
	font-size:18px;
	//position:absolute;


	color:black;
	font-weight:bold;
	line-height:20px;
	margin:0px 10px 12px -10px;
}
.main
{
	font-size : 20px ;
	font-family : "verdana" ;
	text-align : center ;
	width:200px;
	border-color:#008080;
	
}
.btn
{
	background-color : #fff	;
	border-color:#20b2aa;
	width:100px;
	height:30px;
	font-size:15px;
	margin:7px 15px ;
	border-radius:3px;
	
}
.btnn{
	background-color : #f0f8ff	;
	border-color:#000080;
	width:100px;
	height:30px;
	font-size:15px;
	margin:7px 105px 50px;
	border-radius:3px;
}
	
.main2
{
	font-size : 15px ;
	font-family : "verdana" ;
	text-align : center;
	margin:25px;
	position:relative;
}

.btns{
        background-color:white;
	    border-color:#008080;
		width:90px;
		height:30px;
		font-size:18px;
	    margin:10px 35px 0px 2px;
	    border-radius:3px;
	    
}

	

		
.boxes
{
	width : 25% ;
	height:680px;
    border : 2px ;
	border-style:solid;
 
	border-color:#008080;
    padding : 20px ;
	float : left ;
	margin : 30px 40px ;
	background-color :#fff;
    text-align : center ;
}

h3.txt{
	text-align:left;
	color:#800080;
	font-style:italic;
}
li a.nav11 {
        display:block;
        text-align:center;
        padding:12px 12px;
        text-decoration:none;
		top:50px;

		background-color:#029c9c;
		color:white;
		font-size:20px;
	    
		
}ul.l11{
	list-style-type:none;
    float:left;
	width:110px;
	padding:0;
	overflow:hidden;
	margin:50px 1380px 0px ;
}
form.sort{
	margin:-170px 360px 0px;
}
h3.res{
	color:#800080;
	
}
form.sort2{
	margin:-208px 200px  0px 707px ;
}
.icream{
	width:280px;
	height:320px;
}
.body{
background-color:white;}
ul.l11{
	list-style-type:none; 
    
	padding:0;
	overflow:hidden;
}
h1.title
{
    font-family:"Times New Roman";
	font-size:30px;
	text-align:left;
	color:#006666;
	margin-top:-70px;
	margin-left:65px;
	
}	
.imgg{
margin-top:-50px;
}

	li a {
        display:block;
        text-align:center;
        padding:10px 20px 0 0px ;
        text-decoration:none;
		top:50px;
		background-color:#96DED1;
		color:white;
		font-size:20px;
		font-weight:900;
	
		
}
.stock{
	border:none;
	font-size:18px;
	color:#32cd32;
    font-style:italic;
	margin-left:150px;
	font-style:'Times New Roman";
}
.stockk{
	border:none;
	font-size:18px;
	color:red;
    font-style:italic;
	margin-left:100px;
	font-style:'Times New Roman";
}
ul.menu{
	list-style-type:none;
    background-color:#029c9c;
	overflow:hidden;
	width: 58%;
	top:0;
	position:fixed;
	margin:0 -7px;
	padding:0 340px;
}
.active{
        background-color:#029c9c;
		
}

li a:hover:not(.active) {
  background-color:#019191;
}

li{
float:left;
}


</style>
	
</head>


<body>
<ul class="l11">
<li class="nav11"><a class="nav11" href="logout.php">LOGOUT</a></li></ul>
<img src="images/off.png" alt="p1" width="25" height="25" style="margin:-35px 1345px 25px">



<ul class="menu">
    <li class="nav"> <a class="nav" href="index.html">HOME</a></li>
	<li class="nav"><a class="nav" href="products/specs.html">SPECIFICATIONS</a></li>
	
	<li class="nav"><a class="active"  href="order.php">ORDER </a></li>
	<li class="nav"><a class="nav" href="mycart.php">CART</a></li>
	
	
	<li class="nav"><a class="nav" href="about.html">WHY US </a></li>
	<li class="nav"><a class="nav" href="contact.html">CONTACT</a></li>
	
	
</ul> 



<header>
	<img src="images/mobstore.png" alt="ms" class="imgg" width="60" height="60"><h1 class="title"> MOBILE PARADISE</h1>
	
</header>

<?php
session_start();
include("connectionn.php");
include("function.php");
$user_data=chklogin($con); ?>
<h3 class='txt'>Welcome,<?php echo $user_data['user_name'];?></h3>




<br><br><br>
<form method="get">
	  <div>
	    <label for="ice" class="main"><b> </b></label><br><br>
        <input type="text" id="ice" name="ice" class="main">
	    <input type="submit" value="Search" class="btns" name="submit">
      </div>
	</form>   	
	<br><br>
	


<?php
      
      
      if(isset($_GET["submit"]))
	  {	  
        $a = $_GET["ice"] ;
       $conn= pg_connect("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123");
       
        $SQL="SELECT * FROM mobilephones WHERE Model_Name='$a' limit 1" ;
       
	    $result= pg_query($conn,$SQL);
		$row=pg_fetch_array($result);
        if (pg_num_rows($result)>0)
		{
		  if($row["stock"]>0)
			  $i="In Stock";
		  else
			  $i="Out Of Stock ";
	       
                echo "<form action='manage_cart.php' method='post'>
		        <div class='boxes'>
		        <p class='size'><img class='icream' src='$row[image]'/></p>
		 
                <p class='box'>$row[model_name]</p>
          
		        
				<br>";
                 if($i=="In Stock")
		        echo"
		  
                    <input type='text' name='stock'class='stock' value='$i' readonly>";
		         else
			    echo"<input type='text' name='stock'class='stockk' value='$i' readonly>";				
                echo"
		        <p class = 'main2'><i>Price </i> : Rs.$row[price]<br>
                <p class = 'main2'><i> Brand</i> :  $row[brand]<br>
                <p class = 'main2'><i>Rating</i> : $row[rating]<br>
                <p class = 'main2'><i> Quantity </i> : <input type='number' min='1' max='$row[stock]' name='Quantity' required><br><br>";
                if($i=="In Stock")
				echo"<button type='submit' name='Add' class='btn'>Add To Cart</button>";
			
				
			
                echo"<input type='hidden' name='Item_Name' value='$row[model_name]'>
                <input type='hidden' name='Price' value='$row[price]'>
				<input type='hidden' name='mid' value='$row[model_id]'>
                </div>
                </form>";
         
          
		 
	    
        } 
        else 
	    {
          echo ' ';
        }
	  
        
	  }    
	
 ?>
 <br><br><br>
  <form method="get" class="sort">
  <div class="main1">
	    <label for="ice" class="main"> </label><br><br>
		<select name="ice" id="ice" class="main">
		<option>RATING</option>
		<option>5 Star</option>
		<option>4.5 Star</option>
		<option>4 Star</option>
	
		
		</select>
        
	    <input type="submit" value="Filter" class="btns" name="submit"> 
      </div>
	 
	</form>
	<br><br><br>
	<?php

      
      if(isset($_GET["submit"]))
	  {	
        $c = $_GET["ice"] ;
		$connect = pg_connect("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123") ;
          
       
        $SQL="SELECT * FROM mobilephones WHERE Rating='$c'" ;
      
	    $result= pg_query($connect,$SQL);
        if (pg_num_rows($result)>0) 
	    {
		  
	      
		  // output data of each row
            while($row =pg_fetch_array($result))
            {if($row["stock"]>0)
			  $i="In Stock";
		  else
			  $i="Out Of Stock ";
				
                echo "<form action='manage_cart.php' method='post'>
                <div class='boxes'>
		        <p class='size'><img class='icream' src='$row[image]'/></p>
		 
                <p class='box'>$row[model_name]</p>
          
		        <br> ";
                 if($i=="In Stock")
		         echo"
		  
                   <input type='text' name='stock'class='stock' value='$i' readonly>";
		          else
			     echo"<input type='text' name='stock'class='stockk' value='$i' readonly>";				
                echo"
		        <p class = 'main2'><i>Price </i> : Rs.$row[price]<br>
                <p class = 'main2'><i> Brand</i> :  $row[brand]<br>
                <p class = 'main2'><i>Rating</i> : $row[rating]<br>
                <p class = 'main2'><i> Quantity </i> : <input type='number' min='1' max='$row[stock]' name='Quantity' required><br><br>";
                if($i=="In Stock")
				echo"<button type='submit' name='Add' class='btn'>Add To Cart</button>";
				
                echo"<input type='hidden' name='Item_Name' value='$row[model_name]'>
                <input type='hidden' name='Price' value='$row[price]'>
				<input type='hidden' name='mid' value='$row[model_id]'>
                </div>   
                </form>
                     ";
            }
        } 
        else 
	    {
          echo "  ";
        }
	  
      
	}    
	
    ?>
	<br>
	<br><br><br>
  <form method="get" class="sort2">
  <div class="main1">
	    <label for="ice" class="main"> </label><br><br>
		<select name="ice" id="ice" class="main">
		<option>Brand</option>
		<option>SAMSUNG</option>
		<option>Xiaomi</option>
		<option>ONE PLUS</option>
		<option>OPPO</option>
	
		
		</select>
        
	    <input type="submit" value="Filter" class="btns" name="submit"> 
      </div>
	 
	</form>
	<br><br><br>
	<?php
      
      if(isset($_GET["submit"]))
	  {	  
        $c = $_GET["ice"] ;
		$connect=pg_connect	("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123") ;
          
        
        $SQL="SELECT * FROM mobilephones WHERE Brand='$c'" ;
     $result= pg_query($connect,$SQL);
        if (pg_num_rows($result)>0) 
	    
	    {
		  
		  // output data of each row
             while($row =pg_fetch_array($result))
				
            {
				 if($row["stock"]>0)
			  $i="In Stock";
		  else
			  $i="Out Of Stock ";
	      
                echo "<form action='manage_cart.php' method='post'>
                <div class='boxes'>
		        <p class='size'><img class='icream' src='$row[image]'/></p>
		 
                <p class='box'>$row[model_name]</p>
          
		        <br> ";
                   if($i=="In Stock")
		       echo"
		  
               <input type='text' name='stock'class='stock' value='$i' readonly>";
		      else
			    echo"<input type='text' name='stock'class='stockk' value='$i' readonly>";
			echo"
                <p class = 'main2'><i>Price </i> : Rs.$row[price]<br>
                <p class = 'main2'><i>Brand</i> :  $row[brand]<br>
                <p class = 'main2'><i>Rating</i> : $row[rating]<br>
                <p class = 'main2'><i> Quantity </i> : <input type='number' min='1' max='$row[stock]' name='Quantity' required><br><br>";
                if($i=="In Stock")
				echo"<button type='submit' name='Add' class='btn'>Add To Cart</button>";
				
                echo"<input type='hidden' name='Item_Name' value='$row[model_name]'>
                <input type='hidden' name='Price' value='$row[price]'>
				<input type='hidden' name='model_id' value='$row[model_id]'>
                </div>   
                </form>
                     ";
            }
        } 
        else 
	    {
          echo "  ";
        }
	  
       
	}    
	
    ?>
 
 <br><br>
 
 
    
    <?php 
      
      $conn=pg_connect("host=localhost port=5432 dbname=DB1 user=postgres password=bhavi#123");
      
      $sql="SELECT * FROM mobilephones";
      $result=pg_query($conn,$sql) ;
		  
	  while($row=pg_fetch_array($result))
      {
	
		  if($row["stock"]>0)
			  $i="In Stock";
		  else
			  $i="Out Of Stock ";
		  
        echo "<form action='manage_cart.php' method='post'>
        <div class='boxes'>
		  <p class='size'><img class='icream' src='$row[image]'/></p>
		 
          <p class='box'><i>$row[model_name]</i> </p>
          
		  <br> ";
		  if($i=="In Stock")
		  echo"
		  
          <input type='text' name='stock'class='stock' value='$i' readonly>";
		  else
			  echo"<input type='text' name='stock'class='stockk' value='$i' readonly>";
		  echo"
		  <p class = 'main2'><i>Brand </i> : $row[brand] <br>
          <p class = 'main2'><i>Price</i> :  Rs.$row[price] <br>
          <p class = 'main2'><i>Rating</i> : $row[rating]<br>
          <p class = 'main2'><i> Quantity </i> : <input type='number' min='1' max='$row[stock]' name='Quantity' required><br><br>";
		  if($i=="In Stock")
          echo"<button type='submit' name='Add' class='btn'>Add To Cart</button>";
		   
	
          echo"<input type='hidden' name='Item_Name' value='$row[model_name]'>
          <input type='hidden' name='Price' value='$row[price]'>
		  <input type='hidden' name='model_id' value='$row[model_id]'>
        </div>   
       </form>
            ";
      }
             
    ?>

           
  




</body>


</html>