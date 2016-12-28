<?php
	include_once 'dbconfig.php';
	$first_nameErr = $last_nameErr = $nicknameErr = $emailErr = $city_nameErr = $genderErr = $mobileErr = $commentErr = "";
	if(isset($_POST['btn-save']))
	{
		$error = "";
		$first_name = test_input($_POST["first_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z- ]*$/",$first_name)) {
			$first_nameErr = "<br><em style='font-size:20px'>Only letters and white space allowed</em>";
			$first_name = "";
			$error = "firstname";
		}
		
		$last_name = test_input($_POST["last_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
			$last_nameErr = "<br><em style='font-size:20px'>Only letters and white space allowed</em>";
			$last_name = "";
			$error = "lastname";
		}
		
	  	$nickname = test_input($_POST["nickname"]);
	  	if (!preg_match("/^[a-zA-Z ]*$/",$nickname)) {
			$nicknameErr = "<br><em style='font-size:20px'>Only letters and white space allowed</em>";
			$nickname = "";
			$error = "nickname";
		}
		
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "<br><em style='font-size:20px'>Invalid email format</em>";
			$email = "";
			$error = "email";
		}
		
		$city_name = test_input($_POST["city_name"]);
		
		$comment = test_input($_POST["comment"]);
		
		$gender = test_input($_POST["gender"]);
		
		$mobile = test_input($_POST["mobile"]);
		
		if(!preg_match("/^[0-9-]*$/",$mobile)){
			$mobileErr = "<br><em style='font-size:20px'>&nbsp;Only numbers are allowed</em>";
			$mobile = "";
			$error = "mobile";
		}
		
		if($error === ""){
			$sql_query = "INSERT INTO users(first_name,last_name,nickname,email,user_city,gender, mobile, comment) VALUES('$first_name','$last_name','$nickname','$email','$city_name','$gender','$mobile','$comment')";
			if(mysqli_query($con,$sql_query)){
				?>
				<script type="text/javascript">
				alert('Data input succesful');
				window.location.href='form-home.php';
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
				alert('error occured while inputting data');
				</script>
				<?php
			}
			// sql query for inserting data into database
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		MIRIFICAL
	</title>
	<style>
		body{
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
		h1{
			text-align:center; 
			color:black;
		}
		div.transbox {
			margin: 200px;
			background-color: #ffffff;
			border: 1px solid black;
			opacity: 0.6;
			filter: alpha(opacity=60);
			padding-bottom: 0.5;
		}
		div.transbox p {
			margin: 5%;
			font-weight: bold;
			color: #000000;
		}
		p {
			padding-top: 20px;
		}
		p{
			text-align: center;
			font-size: 18;
			font-family: courier;
		}
		.error {color: #FF0000;}
	</style>

	<script type="text/javascript">
		function edt_id(id)
		{
		 if(confirm('Sure to edit ?'))
		 {
		  window.location.href='edit_data.php?edit_id='+id;
		 }
		}
		function delete_id(id)
		{
		 if(confirm('Sure to Delete ?'))
		 {
		  window.location.href='index.php?delete_id='+id;
		 }
		}
	</script>
	<body>
		<head>
			<div style="padding-left:445px; padding-right:500px;">
			<img src="lips.png" style="padding-top:1%;position:absolute;align:center;opacity:1.0;filter:alpha(opacity=100)"></a>
			<img src="img.png" alt="Calligraphy Fonts" style="padding-top:8%;position:relative;top:90;opacity:1.0;filter:alpha(opacity=100)"></a>
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
		<hr width="60%">
			<center><a href="Home.php" targertsel>HOME &nbsp;&nbsp; 
			<a href="AboutMe.php" targertsel>ABOUT &nbsp;&nbsp; 
			<a href="Hobbies.php" targertsel>H & T &nbsp;&nbsp; 
			<a href="Trivia.php" targertsel>TRIVIA &nbsp;&nbsp; 
			<a href="form-home.php" targertsel>PHP Form </center></a>
		<hr width="60%">
		<hr width="60%">
		<br>
		<h1 style="font-size:30px;margin-top:25px">ADD DATA</h1>
		<br>
		<div class="transbox" style="margin-top:-20px">
			<form method="post">
			<p><a href="form-home.php"><strong>*back to main page*</strong></a> 
				<br>
				<br>
				First Name: <span class="error">* <?php echo $first_nameErr;?></span><br>
				<input type="text" name="first_name" placeholder="First Name" required>
				<br><br>
				Last Name: <span class="error">* <?php echo $last_nameErr;?></span><br>
				<input type="text" name="last_name" placeholder="Last Name" required>
				<br><br>
				Nickname: <span class="error">* <?php echo $nicknameErr;?></span><br>
				<input type="text" name="nickname" placeholder="Nickname" required>
				<br><br>
				Email: <span class="error">* <?php echo $emailErr;?></span><br>
				<input type="text" name="email" placeholder="Email Address" required>
				<br>
				<br>
				Home: <br>
				<input type="text" name="city_name" placeholder="City" required>
				<br><br>
				Gender: <br>
				<input type="radio" name="gender" value="female" title="Female">&nbsp;<img src="female.png" style="width:35px;height:30px" title="Female">
				<input type="radio" name="gender" value="male" title="Male"><img src="male.png" style="width:30px;height:30px" title="Male">
				<br><br>
				Mobile: <span class="error">* <?php echo $mobileErr;?></span><br>
				<input type="text" name="mobile" placeholder="Mobile Num" required>
				<br><br>
				Comment: <br>
				<textarea name="comment" placeholder="insert comment here" rows="3" cols="30"></textarea>
			</p>
			<center><button type="submit" name="btn-save"><strong>SAVE</strong></center>
			</form>
		</div>

		<footer>
		<center>
		<hr width="70%">
		<hr width="70%">
			<b><p style="color:black;margin-top:7em;margin-bottom:0.1em;font-size:12px;font-family:courier">copyrights 2016</b></p>
			<center><p style="margin-top:0.1em;margin-bottom:0.1em">
				<a href="https://www.facebook.com/rheaayungon/"target="_blank"><img a src="fblogo.png" style="width:50px;height:50px"></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="https://www.instagram.com/rheaayungon/?hl=en"target="_blank"><img src="iglogo.png" style="width:50px;height:50px;">&nbsp;
				<a href="https://www.twitter.com/rheaayungon/"target="_blank"><img src="twitterlogo.png" style="width:52px;height:52px;">
				</a></center>
		</center>
	</footer>
	</body>
</html>