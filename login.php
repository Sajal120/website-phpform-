<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: supervisor.php");    //goto supervisor page when login is good
}

$conn=mysqli_connect("localhost","root","","attempts");   //create attempts table
$msg=""; 
if(isset($_POST["submit"]))
{      //in login
    
	$query1 = "CREATE TABLE IF NOT EXISTS attempt_count          
			(
				id int(100) auto_increment PRIMARY KEY,
				
				ip_address VARCHAR(30),
				time_count INT(30)
			
			);";

	$result1 = mysqli_query($conn, $query1);  //connectoto dataabase run the query
			
			if(!$result1) // run the query
			{
				die('Connection Error (' .$conn -> connect_errno . ')' );
			}	

  //echo "<pre>";  
   //print_r($_POST);  
   $ip_address=getUserIpAddr();  
   $time=time()-30; //30 sec  
   $check_attmp=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as total_count from attempt_count where time_count>$time and ip_address='$ip_address'"));  
   //print_r($check_attmp);  
   $total_count=$check_attmp['total_count'];  
    if ($total_count==3) 
	{  
		$msg="<p style='color:red'>Your account is blocked. Please try after 30 sec</p>";  
   }else
   {
		$usernameemail = $_POST["usernameemail"];
		$password = $_POST["password"];
		$result = mysqli_query($conn, "SELECT * FROM reglog.tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0)
		{ //check password for login
     
			if($password == $row['password'])
			{
			$_SESSION["login"] = true;
			$_SESSION["id"] = $row["id"];
	  
			$_SESSION['USER_ID']=$res['id'];  
	   
			//Delete data after successfully user login  
			mysqli_query($conn,"delete from attempt_count where ip_address='$ip_address'");  
			header("Location: supervisor.php");
			}
			else
			{
				$total_count++;   
				$time_remain=3-$total_count;  
				$time=time(); 
				"<script> alert('Wrong Password'); </script>";	
				if ($time_remain==0) 
				{  
					$msg="<p style='color:red'>Your account is blocked. Please try again after 30 sec</p>";  
				}
				else
				{  
					$msg="<p style='color:red'>Please enter valid login details. ".$time_remain. " attempts remains </p>";  
				}  
				//Data insert into attempt_count table  
			mysqli_query($conn,"INSERT INTO `attempt_count`(`ip_address`, `time_count`) VALUES ('$ip_address','$time')");  
			//Error Message display after enter wrong details  
			//$msg="Please enter valid login details.";  
			}  
		}
		else
		{
				$msg="<p style='color:red'>User Not Registered</p>";  
		}
	}  
}
 //Get proper User IP Address  
 function getUserIpAddr(){  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])){  
     $ip = $_SERVER['HTTP_CLIENT_IP'];  
   }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }else{  
     $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
 }   
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing Login" />
	<meta name="sajal" content="cloud computing Login"  />
	<title> Login </title>
	
	<link href="styles/style.css" rel=" stylesheet"/>

    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
  <!-- including header and logo once by calling its .inc file -->
	<?php              
		include_once("header&logo.inc");   
	?>
	  
<!-- including menu once by calling its .inc file -->
	<?php              
		include_once("menu.inc");   
	?>
    <h2>Login</h2>
    <form class="" action="" method="post" autocomplete="off"> <!-- creating a login form -->
      <label for="usernameemail"><h3>Username or Email: </h3> </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="password"><h3>Password: </h3> </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp;
	  </br>&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
	  <button type="submit" name="submit"><u>Login</u></button>
	  
	  
	  </br></br>&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;
	  <button id="submit"><a href="manage.php">Registration</a></button>

   </form>
    <p><?php echo $msg ?></p>    
  </body>
</html>
