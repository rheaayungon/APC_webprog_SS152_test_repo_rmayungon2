				<?php
			// define variables and set to empty values
			 $Error = $nameErr = $emailErr = $genderErr = $websiteErr = "";
			$name = $email = $gender = $comment = $website = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  
			    $name = test_input($_POST["name"]);
			    // check if name only contains letters and whitespace
			    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			      $nameErr = "Only letters and white space allowed"; 
			      $Error = "Err";
			    }
			  
			  
			    $email = test_input($_POST["email"]);
			    // check if e-mail address is well-formed
			    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			      $emailErr = "Invalid email format"; 
			      $Error = "Err";
			    }
			  
			    
			    $website = test_input($_POST["website"]);
			    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
			    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
			      $websiteErr = "Invalid URL";
			      $Error = "Err";

			    }
			  

			  if (empty($_POST["comment"])) {
			    $comment = "";
			  } else {
			    $comment = test_input($_POST["comment"]);
			  }

			  if (empty($_POST["gender"])) {
			    $genderErr = "Gender is required";
			    $Error = "Err";
			  } else {
			    $gender = test_input($_POST["gender"]);
			  }
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			?>

<html>
	<title>
		MIRIFICAL
	</title>
		<style>
			body {
				background-image: url("bg.jpg");
				background-repeat: no-repeat;
				background-attachment: fixed;
			}
			a:link {
				color:black;
				background-color:transparent;
				text-decoration: none;
				font-family:courier;
				font-size:20px;
				font-weight:bold;
			}
			a:visited {
				color:black;
				background-color:transparent;
				text-decoration: none;
				font-family:courier;
				font-size:20px;
			}
			a:hover {
				color:white;
				background-color:transparent;
				text-decoration: none;
				font-family:courier;
				font-size:20px;
			}
			a:active {
				color:black;
				background-color:transparent;
				text-decoration: none;
				font-family:courier;
				font-size:20px;
			}
			h2 {
				font-family:courier;
				font-size:40px;
				color:black;
				text-align:center;
			}
			p {
				font-family:courier;
				font-size:18px;
				color:black;
				text-align:center;
			}
			button button 1{
				font-family:courier;
				font-size:12px;
				color:black;
				text-align:center;
			}
			div.transbox {
				margin: 200px;
				background-color: #ffffff;
				border: 1px solid black;
				opacity: 0.6;
				filter: alpha(opacity=60);
			}
			div.transbox p {
				font-weight: bold;
				color: #000000;
			}
			p {
				padding-top: 10px;
			}
		</style>
		<head>
			<div style="padding-left:445px; padding-right:500px;">
			<img src="lips.png" style="padding-top:1%;position:absolute;top:0;align:center"></a>
			<img src="img.png" alt="Calligraphy Fonts" style="padding-top:8%; position:relative ;top:90"></a>
		</div>
		</head>
		<br>
			<br>
				<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
		<hr width="60%">
			<center><a href="Home.php" targertsel>HOME &nbsp;&nbsp;
			<a href="AboutMe.php" targertsel>ABOUT &nbsp;&nbsp; 
			<a href="Hobbies.php" targertsel>HOBBIES &nbsp;&nbsp; 
			<a href="Trivia.php" targertsel>TRIVIA &nbsp;&nbsp; 
			<a href="Form.php" targetsel>PHP FORM
		<hr width="60%">
		<h2>
			PHP Form Validation
		</h2>
<div class="transbox"
		<table align="center" style="font-family:courier; font-size:18px;margin-top:2em;margin-bottom:4em;border:2px">

			<p><span class="error">* required field.</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
			  Name: <input type="text" name="name" value="<?php echo $name;?>">
			  <span class="error">* <?php echo $nameErr;?></span>
			  <br><br>
			  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
			  <span class="error">* <?php echo $emailErr;?></span>
			  <br><br>
			  Website: <input type="text" name="website" value="<?php echo $website;?>">
			  <span class="error"><?php echo $websiteErr;?></span>
			  <br><br>
			  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
			  <br><br>
			  Gender:
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
			  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
			  <span class="error">* <?php echo $genderErr;?></span>
			  <br><br>
			  <input type="submit" name="submit" value="Submit">
			</form>

			<?php
			echo "<h2>Your Input:</h2>";
			echo $name;
			echo "<br>";
			echo $email;
			echo "<br>";
			echo $website;
			echo "<br>";
			echo $comment;
			echo "<br>";
			echo $gender;
			?>
	</div>
	</div>
	<footer>
		<center>
		<hr width="70%">
		<hr width="70%">
			<b><p style="color:black;margin-top:7em;margin-bottom:0.1em;font-size:12px;font-family:courier">copyrights 2016</b></p>
			<center><p style="margin-top:0.1em;margin-bottom:0.1em">
				<a href="https://www.facebook.com/rheaayungon/"target="_blank"><img a src="fblogo.png" style="width:50px;height:50px;opacity:1.0;filter:alpha(opacity=100)"></a>&nbsp;
				<a href="https://www.instagram.com/rheaayungon/?hl=en"target="_blank"><img src="iglogo.png" style="width:50px;height:50px;;opacity:1.0;filter:alpha(opacity=100)">&nbsp;
				<a href="https://www.twitter.com/rheaayungon/"target="_blank"><img src="twitterlogo.png" style="width:52px;height:52px;;opacity:1.0;filter:alpha(opacity=100)">
				</a></center>
	</footer>
	</body>
</html>