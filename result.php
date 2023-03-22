<html lang="en">
<head>
 <title> Quiz </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing result" />
	<meta name="sajal" content="cloud computing"  />
	<title>Cloud Computing</title>
<link href="styles/style.css" rel="stylesheet"/> 
</head>
<body class="back">
 </br> </br></br></br></br></br></br></br></br></br></br></br>
<a href="quiz.php"><h1>Have another quiz attempt!!!</h1></a>  <!-- link to go back to the another quiz attempt -->
	
	
	
<div class="area">         <!--In result page making a container area, within there will be 3 labels whose input would be fetched from quiz page -->
	<?php 
			if(isset($_GET["myscore"]))       //getting the result after validation
			{
			$result = $_GET["myscore"];
			echo "<p> $result   </p>";		 
			}
			
	?>
	</div>		
	<br><br>
	
	
	
</body>
</html>