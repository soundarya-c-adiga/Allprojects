<?php
function connect()
{
$link=mysqli_connect("localhost","root","vN6CTX2WfYqEbf","onlinefood");
if(mysqli_connect_error())
{
	die("There was an error connecting to database");
}
else
{
	
	return $link;
}
}
?>