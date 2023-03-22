
<?php
require 'config.php';    //asking for connection
if(!empty($_SESSION["id"])){
  header("Location: supervisor.php");   //go to supervisor page on successful registration
}
$msg ="";
if(isset($_POST["submit"])){   //on submit
  
  
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  
  //create table
  
   $query = "CREATE TABLE IF NOT EXISTS tb_user          
			(
				id int(100) auto_increment PRIMARY KEY,
				
				username VARCHAR(20),
				email VARCHAR(30),
				password VARCHAR(20)
			);";
			
	$result = mysqli_query($conn, $query);  //connectoto dataabase run the query
			
			if(!$result) // run the query
			{
				die('Connection Error (' .$conn -> connect_errno . ')' );
			}
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");  
  if(mysqli_num_rows($duplicate) > 0){        //check whether the given username and email is 
   $msg="<p style='color:red'>Username or Email Has Already Taken</p>";  
  }
  else{
    if($password == $confirmpassword){         //check password and confirm password
     
	  
	  $query = "INSERT INTO tb_user VALUES('','$username','$email','$password')";
      mysqli_query($conn, $query);
      $msg="<p style='color:red'>Registration is Successful</p>";  
    }
    else{
		$msg="<p style='color:red'>Password Does Not Match</p>";  
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing summary after login/registration" />
	<meta name="sajal" content="cloud computing ummary after login/registration"  />
	<title> Manage </title>
	
	<link href="styles/style.css" rel=" stylesheet"/>

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

    <h2>Registration</h2>
	</br></br>
	<div id="quizw">  <!-- In a wrapper, define questions-->
    <form class="" action="" method="post">     <!-- creating a form for registration-->
      <label for="username"><h3>Username: </h3> </label>
	   
      <input type="text" name="username" id = "username" required value=""> <br>
      
	  </br>
	  <label for="email"><h3>Email:</h3> </label>
        
	  <input type="email" name="email" id = "email" required value=""> <br>
      
	  </br>
	  <label for="password"><h3>Password: </h3> </label>
       
	  <input type="password" name="password" id = "password" required value=""> <br>
      
	  </br>
	  <label for="confirmpassword"><h3>Confirm Password: </h3></label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp;
	  </br>
	  &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp;  
	  <button type="submit" name="submit"><u>Register</u></button>
	  </br> </br> &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	  <button id="submit"><a href="login.php">Login</a></button>
    </form>
    <p><?php echo $msg ?></p>    
	</div>
   
  </body>
</html>
