<?php
session_start();
    include("connectionn.php");
	include("function.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			
			$check="SELECT ID FROM users where user_name = '$user_name'";
		$result = pg_query($con,$check);
		    if (pg_num_rows($result)>=1)
			{ echo "<script>alert('Already registered please login')</script>";
		echo "<h2>Already registered, Login!</h2>";
		    }
			else{
			//save to database
			$user_id = random_num(10);
		    $query = "insert into users(user_id,user_name,password) values ('$user_id', '$user_name', '$password')";
			
			pg_query($con, $query);
			
			
			header("Location: login.php");
			die; 
            }			
	    }else
		{
			echo "<h2>Please enter valid information!</h2>";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>MOBILE PARADISE</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'><link rel="stylesheet" href="./style.css">
<link rel="shortcut icon"  href="images/mobstore.png">
<link rel="stylesheet" href="css/icestyle.css">
<style>

body{
  //background: #E8D426 !important;
  font-family: 'Muli', sans-serif;
  background-image: linear-gradient(to left ,rgb(255,255,255),rgb(240,255,255),
rgb(231, 254, 255));
  
}
ul {
	list-style-type:none;
	margin:0px 0px;
	overflow:hidden;
}
li a.nav {
        display:block;
        text-align:center;
        padding:10px 20px;
        text-decoration:none;
		top:50px;
		background-color:#029c9c;
		color:white;
		font-size:20px;
		font-weight:900;
	
		
}
h1.title
{
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
<img src="images/mobstore.png" alt="ms" width="60" height="60"> <h1 class="title">THE MOBILE STORE</h1>
	
</header>

<ul>
    <li class="nav"> <a class="nav" href="index.html">HOME</a></li>
	<li class="nav"><a class="nav" href=" products/specs.html">SPECIFICATIONS</a></li>
	
	<li class="nav"><a class="nav"  href="signup.php">ORDER </a></li>
	<li class="nav"><a class="nav" href="mycart.php">CART</a></li>
	
	
	<li class="nav"><a class="nav" href="about.html">WHY US</a></li>
	<li class="nav"><a class="nav" href="contact.html">CONTACT</a></li>
</ul> 


<body>

<div class="pt-5">
  <h1 class="text-center" style="color:#006b6b">SIGN-UP</h1>
  
<div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                                                    
                            <form id="submitForm" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"><input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                                <div class="form-group required">
                                    <lSabel for="user_name">Username / Email</lSabel>
                                    <input type="email" class="form-control text-lowercase" id="user_name" required="" name="user_name" value="">
                                </div>                    
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password">Password 
                                        <a class="ml-auto border-link small-xl" href="/forget-password"></a></label>
                                    <input type="password" class="form-control" required="" id="password" name="password" value="">
                                </div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember me?</label>
                                    </div>
                                </div>
                                <div class="form-group pt-1">
                                    <button class="btn btn-primary btn-block"  style="background-color:#2E86C1" type="submit">Sign up</button>
                                </div>
                            </form>
                            <p class="small-xl pt-3 text-center">
                                <span class="text-muted">Have an account?</span>
                                <a href="login.php">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div>

  
</body>
</html>




