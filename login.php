
<?php
session_start(); 
$error=''; 
?>
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
        <a class="nav-link color" href="about.html">About</a>
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
          <a class="dropdown-item new1" href="signup.php">Customer SignUp</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
	
    
  </div>
  
</nav>
   <div class="container" id="new3">
   <h2 style="color:blue">LOGIN FORM</h2><br>

   <form method="POST">
   <fieldset class="form-group size">
   <label for="email">Email Address:</label>
   <input type="email" name="email" class="form-control">
   </fieldset>
   
   <fieldset class="form-group size">
   <label for="password">Password:</label>
   <input type="password" name="password" class="form-control">
  </fieldset>
  
   <fieldset >
   <button type="submit" name="submit" class="btn btn-primary">Login</button><br>or if you dont have an account 
   <button type="button" onClick="location.href='signup.php'" class="btn btn-primary">SignUp</button>
   </fieldset>
   
   </form>
   </div>
<?php
include "connection.php";

$link=connect();
 
 if(isset($_POST['submit']))
 {
	 $email=mysqli_real_escape_string($link,$_POST['email']);
	 $password=$_POST['password'];
	 if($email=="")
	 {
		  echo "<script>alert('Email is required');</script>";
		  	 
	 }
	 else if($password=="")
	 {
		 echo "<script>alert('Password is required');</script>";
	 }
	 else{
		 
		 $query="select * from `csignup` where `email`='$email' and `password`='$password';";
		 $result=mysqli_query($link,$query);
		 if(mysqli_num_rows($result)==0)
		 {
			 echo "<p>Invalid email or password!Please Try again</p>";
		 }
		 else {
			     
			     $_SESSION['login_user']=$email;
				 echo "<p>Login Successful!</p>";
				 
				 echo "<script>window.location.assign('foodlist.php');</script>";
				 
			
			
			 
		 }
	 }
 }

?>
