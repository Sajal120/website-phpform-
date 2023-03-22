<!DOCTYPE html>								<!-- Sajal Basnet 104170062  -->
<html lang="en">
<head>
	<title> Enhancements </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="utf-8" />
	<meta name="description" content="index" />
	<meta name="keywords" content="cloud computing enhancement description" />
	<meta name="sajal" content="cloud computing"  />
	 
	<!-- References to external CSS files -->
	<link href="styles/style.css" rel="stylesheet"/>
</head>
<!-- This is a comment. Indenting child elements makes the markup much more readable -->
<body>
	<!-- including header and logo once by calling its .inc file -->
	<?php              
		include_once("header&logo.inc");   
	?> 
	
	<!-- including menu once by calling its .inc file -->
	<?php              
		include_once("menu.inc");   
	?>   
   		
		<p> I have used different kinds of enhancement in this project. For instance, I have modified the few codes taught in lab to using some advanced features from internet.

			Let me list some major enhancements I applied on my project which I took the reference from <a href="https:\\www.w3schools.com")<b> www.w3schools.com</b></a>. 

		<ol><li><a href="topic.php#dun"><b>This</b></a> is a major enhancement where an image is set to infinitely float right, down, left and up.</li>
		<p> 
	<section id="me"> </p>
		<p><b> CSS Code:</p></b>
		<p>/* first create an image and give it an id */

			<p>#si img {							/* setting animation for the cloud computing image in index page */ </p><p>
			width: 400px;                      /*   setting image height, width and position as relative and animation as infinite   */ </p><p>
			height: 300px; </p><p>
			background-color: red; </p><p>
			position: relative; </p><p>
			animation-name: example; </p><p>
			animation-duration: 4s; </p><p>
			animation-iteration-count: infinite; } </p>
			<br>
			<p>
			@keyframes example {   /* setting keyframes*/   </p>  <p>
			0%   { left:0px; top:0px;}                </p>  <p>           
			25%  {  left:100px; top:0px;} </p>  <p>
			50%  { left:100px; top:200px;}           /* floating the image to different location on different keyframes  */ </p>  <p>
			75%  {  left:0px; top:200px;} </p>  <p>
			100% { left:0px; top:0px;}   }</p >
  
	 <p> <b>Reference: </b> https://www.w3schools.com/cssref/css3_pr_animation-keyframes.asp </p>

	
      </section> 
		</p>
		<li> 
			<a href="about.php"> 
			<b>This</b> </a> is one of the major enhancement I used in about page where the text flows on the box changing it's name as soon as it exits one edge of the box.
		</li>
			<p> <section id="me1"> </p>
			<p> </b>CSS Code:</b></p><p>

			<p> /* Make div class named inner in html */ </p>
			.box {  </p><p>
			display: flex;                    /*  box dislpay settings in about page      */ </p><p>
			} </p><p>

			.box .inner {                      /*  setting inner box width height, the fonts and text to flow on it in about page   */ </p><p>
			width: 750px; </p><p>
			height: 500px;    </p><p>                    
			line-height: 500px; </p><p>
			font-size: 5em; </p><p>
			font-family: sans-serif; </p><p>
			font-weight: bold; </p><p>
			white-space: nowrap; </p><p>
			overflow: hidden; </p><p>
			} </p><p>

			.box .inner:first-child {                       /* in inner class,  setting the background color for the box and transforming it accordingly in first-child in about page    */ </p><p>
			background-color: indianred; </p><p>
			color: darkred; </p><p>
			transform-origin: right; </p><p>
			transform: perspective(300px) rotateY(-15deg); </p><p>
			} </p><p>

			.box .inner:last-child {             /*  in inner class, setting the background color for the box and transforming it accordingly in last-child in about page    */ </p><p>
			background-color: lightcoral; </p><p>
			color: antiquewhite; </p><p>
			transform-origin: left; </p><p>
			transform: perspective(300px) rotateY(15deg); </p><p>
			} </p><p>

			.box .inner span { </p><p>
			position: absolute;                             /*  setting the text overflow infinite animation inside inner class in about page  */ </p><p>
			animation: marquee 5s linear infinite; </p><p>
			} </p><p>

			.box .inner:first-child span { </p><p>
			animation-delay: 2.5s;	/*   animation delay settings with the text flowing to left inside inner class in about page    */ </p><p>
			left: -100%; </p><p>
			}</p><p>

			@keyframes marquee {                        /*     setting keyframes and relevant position in about page      */</p><p>
			from { </p><p>
			left: 100%; </p><p>
			} </p><p>

			to { </p><p>
			left: -100%;</p><p>
			}</p><p>
			}</p>

			<p> <b> Reference: </b> https://codepen.io/comehope/pen/GdrrZq </p>

		</ol>
			<p>Let me list the enhancement which was taught to me. </P>
			
			<ul> 
			<li>
				<a href="topic.php#lists"><b> This </b></a> is also a simple enhancement where I have floated four sections on four corners in topic page just for a better view. 
				<p> <section id="tt1">
				<p><b> CSS Code:</p></b>
		  
				<p>#lists {float:left;}  /*a style rule that floats the lists section to the left in topic page*/</p><p>
				table {margin: auto;}  /* Set the margin of the table element to auto to centre it in the column in topic page*/ </p><p>
				#tables {float:right; margin: auto;}  /* Create a rule that floats the tables section to the right in topic page*/ </p><p>
				#hyperlinks {clear:left; float:left;}  /*   to stop subsequent elements from floating and aligning it in right position, we used the following property in topic page*/ </p><p>
				#images {float:right;}  /*   to stop subsequent elements from floating and aligning it in right position, we used the following property in topic page*/  </p><p>
				figure {border: 2px solid #ccc;}     /*   setting border for the figure in topic page*/ </p><p>
				footer {border-top: 4px double red; clear: both;}	/*  setting border for the footer*/ </p><p>
				#lists, #images, #tables, #hyperlinks{width: 40%; text-align: center;}	/*  setting width for the box model in topic page and aligning the text*/ </p><p>
				ol, ul, dl {text-align: left;}  /*aligning text in the list*/</p><p>
		    
					</section> 

			</li>
		</ul>
	<?php              
		include_once("footer.inc");   
	?>
</body>
</html>

