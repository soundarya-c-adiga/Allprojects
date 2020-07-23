

<html>
<head>
<title>Yum Bakes | Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="login.css">
	
	
	
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   <nav class="navbar navbar-expand-lg new4">
   <div class="navbar-header">
  <a class="navbar-brand color" id="color" href="#">YUM BAKES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link color" href="Dashboard.html" >Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link color" href="about.html" >About</a>
      </li>
      <li class="nav-item">
	   <a class="nav-link color" href="#">Contact Us</a>
	  </li>
	  
	   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Signin
        </a>
        <div class="dropdown-menu my-2 my-lg-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item new1" href="adminlogin.php">Manager Signin</a>
          <a class="dropdown-item new1" href="login.php">Customer Signin</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
	  
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         SignUp
        </a>
        <div class="dropdown-menu my-2 my-lg-0" aria-labelledby="navbarDropdown">
          <a class="dropdown-item new1" href="adminsignup.php">Manager SignUp</a>
          <a class="dropdown-item new1" href="#">Customer SignUp</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
	
    
  </div>
  
</nav>

 <div class="container" id="new3">
   <h2 style="color:blue">SIGNUP FORM</h2><br>

   <form method="POST">
   
   <fieldset class="form-group size">
   <label for="name">Full Name:</label>
   <input type="text" name="nam" class="form-control" >
  </fieldset>
  
   <fieldset class="form-group size">
   <label for="username">Username:</label>
   <input type="text" name="usernam" class="form-control" >
  </fieldset>
  
 
   <fieldset class="form-group size">
   <label for="email">Email Address:</label>
   <input type="email" name="email" class="form-control" >
   </fieldset>
   
   <fieldset class="form-group size">
   <label for="email">Password:</label>
   <input type="password" name="password" class="form-control" >
   </fieldset>
   
   <fieldset class="form-group size">
   <label for="Contact">Contact Number:</label>
   <input type="number" name="contact" class="form-control">
  </fieldset>
  
  <fieldset class="form-group size">
   <label for="address">Address:</label>
   <textarea type="text" name="address" class="form-control"></textarea>
   </fieldset>
  
   <fieldset >
   <a href="login.php"><button type="submit" name="submit" class="btn btn-primary" >SignUp</button></a><br>if you already have an account 
   <button type="button" onClick="location.href='login.php'" class="btn btn-primary">Login</button>
   </fieldset>
   
   </form>
   </div>
  
 <?php
include "connection.php";
 
$link=connect();
if(isset($_POST['submit'])) 
{
	
	if($_POST['email']==""){
		echo "<p>Email address is required.</p>";
	}
	else if($_POST['password']==""){
		echo "<p>Password is required.</p>";
	}
	else if($_POST['nam']==""){
		echo "<p>Name is required.</p>";
	}
	else if($_POST['usernam']==""){
		echo "<p>Username is required.</p>";
	}
	else if($_POST['contact']==""){
		echo "<p>Contact Number is required.</p>";
	}
	else if($_POST['address']==""){
		echo "<p>Address is required.</p>";
	}
    else{
		
		$query="SELECT `id` from `csignup` where email='".mysqli_real_escape_string($link,$_POST['email'])."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)>0){
			
			echo "<p>That email address has already been taken</p>";
		}
		else
		{
			
			$email=mysqli_real_escape_string($link,$_POST['email']);
		$name=mysqli_real_escape_string($link,$_POST['nam']);
		$username=mysqli_real_escape_string($link,$_POST['usernam']);
		$contact=$_POST['contact'];
		$address=mysqli_real_escape_string($link,$_POST['address']);
		$password=$_POST['password'];
		//$query="INSERT INTO `csignup`(`name`,`username`,`email`,`contact`,`address`,`password`)VALUES('Soundarya C Adiga','soundarya','soundaryacadiga@gmail.com','9900763839','iddya,surathkal','akshu')";		
			$query="INSERT INTO `csignup`(`name`,`username`,`email`,`contact`,`address`,`password`)VALUES('$name','$username','$email','$contact','$address','$password')";		
	       /* echo "$query";
			echo "$name";
			echo "$email";
			echo "$username";
			echo "$contact";
			echo "$address";
			echo "$password"; */
			if(mysqli_query($link,$query))
			{
				
				
			   echo "<script>window.location.assign('login.php');</script>";	
				echo "<p>You have been signed up!</p>";
				
			
			}
        else{
				echo "<p>There was a problem signing you up-please try again later.</p>";
			}
	   }
	}
}
?>	