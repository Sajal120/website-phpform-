<?php	
	$connObj = mysqli_connect('localhost','root','','quiz');                          //setting local sqlite connection
	if($connObj -> connect_error)
	{
		die('Connection Error (' .$connObj -> connect_errno . ')' );
	}
	
?>
<!-- creating a connection -->