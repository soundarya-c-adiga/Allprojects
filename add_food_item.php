<html>
<head> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" href="login.css">
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
          <a class="dropdown-item new1" href="signup.php">Customer SignUp</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
	
    
  </div>
 </nav>


<div class="container">
    <div class="jumbotron">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    	
    		<a href="manage.php" class="list-group-item active">View Food Items</a>
    		<a href="add_food_item.php" class="list-group-item ">Add Food Items</a>
    		<a href="edit_food_item.php" class="list-group-item ">Edit Food Items</a>
    		<a href="delete_food_item.php" class="list-group-item ">Delete Food Items</a>
        <a href="view_order_details.php" class="list-group-item ">View Order Details</a>
        
    	</div>
    </div>
    


 <div class="container" style="background-color:lightblue;>   
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px; color:blue;"> ENTER THE DETAILS BELOW </h3>
		  
<div class="container" >
<form method="POST">
<fieldset class="form-group">
<input type="text" class="form-control" name="fname" placeholder="Enter the food name" required>
</fieldset>
<fieldset class="form-group">
<input type="text" class="form-control" name="price" placeholder="Enter the price" required>
</fieldset>
<fieldset class="form-group">
<input type="text" class="form-control" name="image" placeholder="Enter the food image path" required>
</fieldset>
<fieldset>
<button type="submit" class="btn btn-primary" name="submit">Add food</button>
</fieldset>

</form>
</div>
</div>

<?php
include "connection.php";
$link=connect();
if(isset($_POST['submit']))
{
  $name=$_POST['fname'];
  $price=$_POST['price'];
  $image=$_POST['image'];

 $query="INSERT INTO `foodlist` (`name`, `image`, `price`) VALUES  ('$name','$image','$price')";
 
 if(mysqli_query($link,$query))
 {
	?> <p>Successfully added the food item.You may proceed.</p> <?php
 }else
 { ?>
	 <p>There was a problem adding food.</p> <?php
 }
}
?>
		  
		  
		  
		  

