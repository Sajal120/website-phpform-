<?php
  function sanitize_input($data)  //sanitize the data by trimming,stripslashing, using htmlspecialchars of data
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST["answer1"]))       
  {
	$score =0;
    $errMsg = "";
	$firstName  = sanitize_input($_POST["firstName"]);
	$lastName  = sanitize_input($_POST["lastName"]);
	$studentId  = sanitize_input($_POST["studentId"]);
	$answer1= $_POST["answer1"];
    $answer1= sanitize_input($answer1);
    $answer2  = sanitize_input($_POST["answer2"]);
	$q2= $_POST["q2"];
	 
	 
    if(strlen($firstName) == 0){  //validation for first name
		$errMsg .= "<p style='color:red'>First Name is required </p>";}
	else if(strlen($firstName) > 30){
		$errMsg .= "<p style='color:red'>First Name should not be more than 30 characters long </p>";}
	else if(!preg_match("/^([a-z A-Z0-9\-])*$/", $firstName)) {
		$errMsg .= "<p style='color:red'>First Name should be of alpha|space|hyphen characters</p> ";}
	
	if(strlen($lastName) == 0){              //validation for last name
		$errMsg .= "<p style='color:red'>Last Name is required </p>";}
	else if(strlen($lastName) > 30){
		$errMsg .= "<p style='color:red'>Last Name should not be more than 30 characters long </p>";}
	else if(!preg_match("/^([a-z A-Z0-9\-])*$/", $lastName)) {
		$errMsg .= "<p style='color:red'>Last Name should be of alpha|space|hyphen characters </p>";}
		
	if(strlen($studentId) == 0){
		$errMsg .= "<p style='color:red'>Student id is required </p>";}
	else if (strlen($studentId) <7 || strlen($studentId) >10 )                        //validation for student id
		$errMsg .= "<p style='color:red'>Student number of either 7 or 10 digits to be entered</p>";
	
	
	if(strlen($answer1) == 0)																		//validation for question 1
      $errMsg .= "<p style='color:red'>Please enter the answer for question 1</p>";
	else if(strtolower($answer1) == "saas")  // mark it
	  $score +=20;
	  
	if(strlen($answer2) == 0)
      $errMsg .= "<p style='color:red'>Please enter the answer for question 2</p>";						//validation for question 2
	else if(strtolower($answer2) == "paas")  // mark it
	  $score +=20;
	  
	
	if (isset($_POST['q3a']) || isset($_POST['q3b']) || isset($_POST['q3c']) )		//validation for question 3
		$errMsg .= "";
	else	
		$errMsg .= "<p style='color:red'>Please check atleast one answer for question 3 </p>";	
	
	if(isset($_POST['q3a']) && isset($_POST['q3c'])) 
			$errMsg .= "";
	else if(isset($_POST['q3a']) && isset($_POST['q3b'])) 	
			$errMsg .= "";
	else if(isset($_POST['q3b']) && isset($_POST['q3c'])) 	
			$errMsg .= "";
	else if(isset($_POST['q3a']) && isset($_POST['q3b']) && isset($_POST['q3c']) ) 	
			$errMsg .= "";
	else if(isset($_POST['q3a']))
			$score += 20; 
	
	if ($q2 =='q2a' ) 		//validation for question 4
		$errMsg .= "";
		$score += 20; 
	if ($q2 =='q2a' || $q2 =='q2b' || $q2 =='q2c') 
		$errMsg .= "";
	else
		$errMsg .= "<p style='color:red'>Please check one answer for question 4</p>";
	

	if($_POST['q5'] == 'opt') 
			$errMsg .="<p style='color:red'>Please select an option for question 5</p>"; //validation for question 5
			
	 
			
	if ($_POST['q5'] =='ans')		//validation for question 5
		$score += 20; 
	
		
	
	if($errMsg =="") //decsion making                            // if(strlen( $errMsg) ==0)
	{
		//Good
		
		if($score > 0)
		{
			//connecto to databse
			require_once("settings.php");
			
			
			//create attempts table if not exists
			
			$query = "CREATE TABLE IF NOT EXISTS attempts
			(
				id int(2) auto_increment PRIMARY KEY,
				Date DATE,
				Time TIME,
				FirstName VARCHAR(20),
				LastName VARCHAR(20),
				StdNo VARCHAR(10),
				AttemptNo int(2),
				Score int(4)
			);";
			
			$result = mysqli_query($connObj, $query);  //connectoto dataabase run the query
			
			if(!$result) // run the query
			{
				die('Connection Error (' .$connObj -> connect_errno . ')' );
			}
			
			
			
			// Load and checkthe number of attempts
			
			$query = "SELECT * FROM attempts WHERE stdNo = '$studentId' ";
			
			$result  = mysqli_query($connObj, $query);
			$record = mysqli_fetch_assoc($result);
			
			$attempts = 0;
			while($record) //atleast one refcord is found
			{
				$attempts++;
				$record = mysqli_fetch_assoc($result);
				
			}
			mysqli_free_result($result); //free up resources			
			if($attempts<2)
			{
				$attempts += 1;
					 
			
					
			
				//insert my attempt to table
			
				  // current date
				$currDate = date("Y-m-d"); // current date
				$currTime = date("h:i:sa"); // current time
				$query = "INSERT INTO attempts (Date, Time, FirstName, LastName, StdNo, AttemptNo, Score)
									VALUES ('$currDate', '$currTime', '$firstName', '$lastName', '$studentId', '$attempts', '$score');";
									
				$result = mysqli_query($connObj, $query);  //connect to database run the query
			
				if(!$result) // run the query
				{
					die('Connection Error (' .$connObj -> connect_errno . ')' );
				}
				
			
				header("location:result.php?myscore= Score=$score First Name=$firstName Last Name=$lastName Student ID=$studentId Attempt Number=$attempts "); //sending the result to result page after validation
			
			}
			else{
				header("location:quiz.php?message='Attempts exceeded: Only 2 attempts allowed'");
				} 
			mysqli_close($connObj); //close the database connection
	
		}
		else
		{
			header("location:quiz.php?message='Your score is 0'");         // goto quiz page with the message
		}
	}
	else
	{
		//error
		header("location:quiz.php?message=$errMsg");
	}
	
  }
 

  else 
  {
    //echo "<p> Go to form first </p>";
	header("location:quiz.php");
  }
  
  ?>
