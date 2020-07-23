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
	  
	  <li class="nav-item">
        <a class="nav-link color" href="foodlist.php" >Go back to Menu</a>
      </li>
	   <a class="nav-link color" href="logout.php" >Logout</a>
        </li>
          </ul>

    </ul>
	
    
  </div>
 </nav>
 
 <?php
 session_start();
 include "connection.php";
 $link=connect();
 $gtotal=$_SESSION['gtotal'];
 ?>
 
  <div class="container">
          <div class="jumbotron">
            <h1>Choose your payment option</h1>
          </div>
        </div>
        <br>
<h1 class="text-center" style="margin-top:10rem;">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
<h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
<br>
<h1 class="text-center">

  <a href="cart.php"><button class="btn btn-success" ><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button></a>
<form method="POST"> 
 <a href="onlinepay.php"><button class="btn btn-success" type="submit" name="submit1" ><span class="glyphicon glyphicon-credit-card"></span> Pay Online</button></a>
  <a href="cod.php"><button class="btn btn-success" type="submit" name="submit2"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button></a>
</h1></form>

<?php
if(isset($_POST['submit1']) or (isset($_POST['submit2'])))
{	
foreach($_SESSION['shopping_cart'] as $keys => $values)
{
	
    $email = $_SESSION['login_user']; 
    $name = $values['item_name'];
    $quantity = $values['item_quantity']; 
    $price = $values['item_price'];
    $totalprice = number_format($values['item_quantity'] * $values['item_price'],2);
    $order_date = date("Y-m-d H:i:s");
	
	$query = "INSERT INTO `order` (`email`,`name`,`quantity`,`price`,`totalprice`,`order_date`) VALUES ('$email','$name','$quantity','$price','$totalprice','$order_date')";
    //echo "$query";
	if(mysqli_query($link,$query))
	{
		echo "</p>Successfully added.</p>";
		
	  }
	  
		
	}
	
 if(isset($_POST['submit1']))
        {
	   header("Location: onlinepay.php");
	
      }else if(isset($_POST['submit2'])){

	  header("Location: cod.php");	
	  }  
} 

/* if(isset($_POST['submit1']))
        {
	   header("Location: onlinepay.php");
	
      }else{
		echo "<script>window.location.assign('cod.php');<script>";
	  header("Location: cod.php");

	
} */



?>
