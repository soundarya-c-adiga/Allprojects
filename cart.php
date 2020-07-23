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
	  
	  
	   <li class="nav-item">
        <a class="nav-link color" href="logout.php" >Logout</a>
      </li>
	  
    </ul>
	
    
  </div>
 </nav>

 

<div class="container">
    <div class="jumbotron">
     <h1>Hello Customer! </h1>
     <p>Your food cart is here</p>
	 

    </div>
    </div>
	
<?php
session_start();
include "connection.php";
$link=connect();

//$item_array_id = array_column($_SESSION['shopping_cart'],"item_id");



?>

<div style="margin-top:10rem;"></div>
<br />
<div class="table-responsive">
 <table class="table table-bordered" style="width:1000px;margin-left:10px;background-color:lightgray;">
  <tr>
   <th width="20%">Item Name</th>
   <th width="4%">Quantity</th>   
   <th width="4%">Price</th>
   <th width="4%">Total</th>
   <th width="20%">Action </th>
  </tr>
  <?php
  if(!empty($_SESSION['shopping_cart']))
  {
	  $item_array_id = array_column($_SESSION['shopping_cart'],"item_id");

	  $total=0;
	  foreach($_SESSION['shopping_cart'] as $keys => $values)
	  {
	?>
	<tr>
	  <td><?php echo $values['item_name']; ?></td>
	  <td><?php echo $values['item_quantity']; ?></td>
	  <td>Rs. <?php echo $values['item_price']; ?></td>
	  <td><?php echo number_format($values['item_quantity'] * $values['item_price'],2); ?></td>
	  
	  <td><a href="cart.php?action=delete&id=<?php echo $values['item_id']; ?>"><span class="text-danger">Remove</span></a></td>
	  
	</tr>
   <?php
        $total = $total + ($values['item_quantity'] * $values['item_price']);   
	  }
	?>
	<tr>
	<td align="right" colspan="3">Total</td>
	<td align="right">Rs. <?php echo number_format($total,2);?></td>
	<td><a href="book.php" class="text-success">Buy now</a></td>
	</tr>
	</table>
</div>
</div> 
<?php	
  }
  if(isset($_GET['action']))
  {
	  if($_GET['action']=="delete")
	  { 
       
	   foreach($_SESSION['shopping_cart'] as $keys => $values)
	  {
		if($values['item_id']== $_GET['id'])
		{
			unset($_SESSION['shopping_cart'][$keys]);
			echo "<script>alert('Item Removed')</script>";
			echo "<script>window.location.assign('cart.php');</script>";
			
		}			
		  
		  
	  }
	  }
  }
  ?>
 
	
	