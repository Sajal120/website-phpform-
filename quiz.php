<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing quiz" />
	<meta name="sajal" content="cloud computing"  />
	<title> Quiz </title>
	
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
	<!-- star form -->
	<a href="enhancement2_1.html">
			<div id="bi1"> 
				<img align = "left" src="images/star.jpg" /> 
			</div>
	</a>
	
	<div class="rules">         <!-- In a wrapper, define rules-->
				<fieldset>
					<legend>Game Rules
							
					</legend>
					<fieldset>
					<legend>For Question 1, 
							Score: 20 points 
					</legend>
				 
					</fieldset>	
					<fieldset>
					<legend>For Question 2, 
							Score: 20 points 
					</legend>
					 
					</fieldset>	
					<fieldset>
					<legend>For Question 3, 
							Score: 20 points 
					</legend>
					 
					</fieldset>	
					<fieldset>
					<legend>For Question 4, 
							Score: 20 points 
					</legend>
					 
					</fieldset>	
					<fieldset>
					<legend>For Question 5, 
							Score: 20 points
					</legend>
					 
					</fieldset>	
					<fieldset>
					<legend>Total Score: 100 points
					</legend>
					</fieldset>	 
				</fieldset>				
				
			</div>
			
	<div class="contact-form">
	<fieldset>
	<legend> Student Details </legend>
    <form id = "myform" method = "post" action= "markquiz.php">
      <p>
		<label for="firstName">First Name</label> 
        <input type="text" id= "firstName" name= "firstName">
		</p>
		<p>
		<label for="lastName">Last Name</label>
        <input type="text" id= "lastName" name= "lastName">
		
		</p>
		<p>
		<label for="studentId">Student id</label>
        <input type="text" id= "studentId" name= "studentId">
	  </p>
	  </fieldset>
	  </div>
	
		<div class="quiz1">	  <!-- In a wrapper, define questions-->
		<fieldset>

					<legend>
						Question 1
					</legend>
					<label>
						Please type a cloud-based software delivery model in which the cloud provider develops and maintains cloud application software, provides automatic software updates, and makes software available to its customers via the internet on a pay-as-you-go basis.
					</label>
				<br><br><input type="text" id= "answer1" name= "answer1">  <!-- answ:SAAS -->                
				</fieldset>
				
				<fieldset>
					<legend> Question 2
					</legend>
					<label>	
						Please type a cloud computing model where a third-party provider delivers hardware and software tools to users over the internet.
					</label>
					
				  
					<br><textarea name="answer2"rows="4" cols="20"  name= "answer2" id="answer2" placeholder="SAAS"> 
					</textarea>  <!-- answ:PAAS --> 	

				</fieldset>  
				
			</div>
			<div class="quiz1">	  <!-- In a wrapper, define questions-->
				<fieldset>
					<legend> Question 3
					</legend>
					<label>
					What cloud service do you think can be used for web/app development? 
					</label>
					  <!--Checkbox Question  -->
					<label> 
						<input type="checkbox" name="q3a[]"value="a" id="q3a"/>SAAS  <!--answer -->
					</label>
					<label>
						<input type="checkbox" name="q3b[]" value="b"  id="q3b" /> PAAS  
					</label>
					<label>
						<input type="checkbox" name="q3c[]" value="c" id="q3c"/>IAAS 
					</label>
 
					 
				</fieldset>	
				
				 																					
				<fieldset>
					<legend> Question 4
					</legend>
					<label>
					What cloud service for companies that need out-of-the-box services like CRM (even CRM for Gmail), email and collab tools is a best fit?
					</label>
					</legend> <!--Radio-button Question  -->
 
				 
					<input type="radio" name ="q2" value ="q2a" id="q2a"> SAAS  <!--answer -->
			 
					<input type="radio" name ="q2" value ="q2b" id="q2b"> PAAS
			 
					<input type="radio" name ="q2" value ="q2c" id="q2c"> IAAS 
			 
					 
				</fieldset>
					 
			</div>
			</div>
			<div class="para1">  <!-- In a wrapper, define questions-->
			
				<fieldset>
					<legend> 
					Question 5
					</legend>
					<label> 
					If you need a platform for building software products, what cloud service is the best fit?
					</label>
					</legend> <!--Droplist Question  -->
					<label> Cloud Service 
					</label>
					<select name = "q5">
						<option value="opt" >Select one  
						</option>
						<option value="ans" >PAAS <!--answer -->
						</option>
 						<option value="sas">SAAS
						</option>
						<option value="ias" >IAAS
						</option>
					</select>
				
				</fieldset>
			 </div>
			 </br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="submit"></label>
        <input type="submit" id = "submit" name="submit" value="Submit">
    
	<?php 
			if(isset($_GET["message"]))
			{
				
			$err = $_GET["message"];
			echo "<p> $err </p>";
			}
			
			?>
	</form>
   

  </body>
</html>