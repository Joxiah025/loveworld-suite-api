<?php
function connect($db)
{
	$server="localhost";
	$username="root";
	$password="";
	$dbname
	//connect to db
	$db = mysqli_connect($server,$username,$password,$dbname);
	//check for success
	if(!$db)
	{
		die("Couldn't connect to db".mysqli_connect_error());
	}
}
?>