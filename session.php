
<?php
include "connection.php";
$conn = connect();

session_start();

$user_email=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT * FROM csignup WHERE `email`='".mysqli_escape_string($conn,$user_email)."';";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);
$login_session =$row['username'];

?>