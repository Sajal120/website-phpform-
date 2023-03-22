<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing Supervisor for accessing different functions" />
	<meta name="sajal" content="cloud computing"  />
	<title> Supervisor </title>
	
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
	
	<a href="enhancement2_2.html" target="_blank"><br>   <!-- When answer image is clicked it goes to a new page with answers -->
				<div id="bi"> 
					<img src="images/ans.jpg" alt="Answers" title="Answers" height="200" width="300" />
				</div>
	</a>
	<a href="logout.php"><h1>!!!Logout!!!</a> </h1>

	&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	 &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	 &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
	  &nbsp;  &nbsp; 
	 <h2> Results </h2>
		
  <?php
  //fetch records from database and show here
	require_once("settings.php");
	
	
	
	//update
	if(isset($_POST["studentIdupdate"])) //coming from the search form
	{
		$StdNoup = trim($_POST["studentIdupdate"]);
		$attempt = $_POST["attemptNumber"];
		$Score1 = $_POST["newScore"];
		
		
		$queryup = "UPDATE attempts SET Score='$Score1' WHERE StdNo='$StdNoup' AND AttemptNo='$attempt' ";
		
		if($connObj)
		{
			$resultup = mysqli_query($connObj, $queryup);
			
			
			if($resultup)
			{
				$rowsupdated = mysqli_affected_rows($connObj);
				if($rowsupdated >=1)
				{
					echo "<p style='color:red'> Successfully updated Score of ID: ". $StdNoup . "!</p>";
				}
				else
				{
					echo "<p style='color:red'> There is no attempt made by an ID: ". $StdNoup . " to update </p>";
				}
			}
		}
		else
			{
				echo "<p style='color:red'> Unable to connect to database  </p>";
			}
		}
	
	
	
	//Delete query
	
	
	if(isset($_POST["studentiddelete"])) //coming from the search form
	{
		$StdNodel = trim($_POST["studentiddelete"]);
		$querydel = "DELETE FROM attempts WHERE StdNo='$StdNodel'";
		
		if($connObj)
		{
			$resultdel = mysqli_query($connObj, $querydel);
			
			
			if($resultdel)
			{
				$rowsdeleted = mysqli_affected_rows($connObj);
				if($rowsdeleted >=1)
				{
					echo "<p style='color:red'> Successfully deleted attempts of ID: ". $StdNodel . "!  </p>";
				}
				else
				{
					echo "<p style='color:red'> There is no attempt made by an ID: ". $StdNodel . " to delete!  </p>";
				}
			}
		}
		else
			{
				echo "<p style='color:red'> Unable to connect to database </p>";
			}
		}
	
	
	
	
	
	
	//query selection for search
	 if(isset($_POST["studentid"])) //coming from the search form
	{
		$StdNo = trim($_POST["studentid"]);
		$FirstName = trim($_POST["FirstName"]);
		$LastName = trim($_POST["LastName"]);
		
		if(!empty($StdNo))  
		{
			$query = "SELECT * FROM attempts WHERE StdNo='$StdNo'";
		}
		if(empty($StdNo))  
		{
			$query = "SELECT * FROM attempts WHERE FirstName LIKE '%$FirstName%' AND LastName LIKE '%$LastName%'";
		}
	}
	
	
	
	
	else if(isset($_POST["studentid3"])) //coming from the search form where score is 50% on attempt2
	{
		
			$query = "SELECT * FROM attempts WHERE Score<'50' AND AttemptNo='2'  ";
		
	}
	else if(isset($_POST["studentid2"])) //coming from the search form where score is 100% on attempt1
	{
		
			$query = "SELECT * FROM attempts WHERE Score='100' AND AttemptNo='1'  ";
		
	}
	

	
	else
	{
		$query = "SELECT * FROM attempts";
	}
	if($connObj)
	{
		$result = mysqli_query($connObj, $query);
		if(!$result)
		{
			die('Connection Error (' .$connObj -> connect_errno . ')' );
		}
		//fetch records
		$record = mysqli_fetch_assoc($result);
		if($record)
		{
			//show record
			echo "<table border = '1'>";
			echo "<tr>
						<th> Student Number </th>
						<th> First Name </th>
						<th> Last Name</th>
						<th> Attempt Number</th>
						<th> Attempt Score% </th>
						<th> Date of attempt</th>
						<th> Time of attempt</th>
				</tr>";
			while ($record)
			{
				echo "<tr>";
				echo "	<td>" . $record['StdNo'] . "</td>";
				echo "	<td>" . $record['FirstName'] . "</td>";
				echo "	<td>" . $record['LastName'] . "</td>";
				echo "	<td>" . $record['AttemptNo'] . "</td>";
				echo "	<td>" . $record['Score'] .  '%' . "</td>";
				echo "	<td>" . $record['Date'] . "</td>";
				echo "	<td>" . $record['Time'] . "</td>";
				
				$record = mysqli_fetch_assoc($result); //again fetch the data
			//end of while
			}
		
			echo "</table>";
			mysqli_free_result($result);
		}
		else
		{
			echo "<p style='color:red'> There is no attempt recorded yet</p>";
		}
		
		mysqli_close($connObj);
	}
	else
	{
		echo "<p style='color:red'> Unable to connect to database </p>";
	}
	?>
	</br>
	 <!-- creating required forms so that the user can search the database based on the following inputs-->
  <fieldset>
		<legend> Search Students  </legend>
		<form id method = "post" action= "supervisor.php ">  
		<p>
		
		<label for="FirstName">First Name</label> 
        <input type="text" id= "FirstName" name= "FirstName">
		</p>
		<p>
		<label for="LastName">Last Name</label>
        <input type="text" id= "LastName" name= "LastName">
		
		</p>
		<p>
		<label for="studentId">Student Number</label>
        <input type="text" id= "studentid" name= "studentid">
	   </p>
	    <label for="submit"></label>
        
		<input type="submit" id = "submit" value="Search">
		</form>
   
	</fieldset>
	</br>
	 <fieldset>
		<legend> Search Students with the score of 100% on first attempt </legend>
		<form id method = "post" action= "supervisor.php ">
	  	<p><input type="text"  id="studentid2" name="studentid2" hidden /> </p>
         
		
        <label for="submit"></label>
        
		<input type="submit" id = "submit" value="Search">
		</form>
   
	</fieldset>
	
		 <fieldset>
		 <legend> Search Students with the score less than 50% on second attempt </legend>
		<form id method = "post" action= "supervisor.php ">
		
		 </br>
	
	  	<p><input type="text" name="studentid3" hidden /> </p>
        <label for="submit"></label>
        
		<input type="submit" id = "submit" value="Search">
		</form>
   
	</fieldset>
	
	
	
	<fieldset>
	
		<legend> Delete Student attempts</legend>
		<form id method = "post" action= "supervisor.php">
		<p>
		<label for="studentId">Student Number</label>
        <input type="text" id= "studentiddelete" name= "studentiddelete" />
	   </p> 
        <label for="submit"></label>
        
		<input type="submit" id = "submit" value="Delete">
		</form>
   
	</fieldset>
	
	<fieldset>
		<legend> Update Student attempts</legend>
		<form id method = "post" action= "supervisor.php ">
		<p>
		<label for="studentIdupdate">Student Number</label>&nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
        <input type="text" id= "studentIdupdate" name= "studentIdupdate">
	   </p>
	  	<p>
		<label for="attemptNumber">Attempt Number</label> 
        <input type="text" id= "attemptNumber" name= "attemptNumber">
		</p>
		<p>
		<label for="newScore">New Score</label> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
        <input type="text" id= "newScore" name= "newScore">
		
		</p>
		
        <label for="submit"></label>
        
		<input type="submit" id = "submit" value="Update">
		</form>
   
	</fieldset>
   
  </body>
</html>