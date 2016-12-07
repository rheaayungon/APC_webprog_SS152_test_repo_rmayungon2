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
				padding-top: 50px;
			}
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
		<div style="text-align:center; margin-top:5em; margin-bottom:-30">
			<p style="font-family: amethyst; font-size: 50px;"> (metanoia) </p>
		</div>
		
		<div id="div.menu">
			<ul style="font-size:40" id="subcat">
				<li>
					<a href="mypage-p.php" id="headlink">main</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</li>
				<li>
					<a href="mypage2-p.php" id="headlink">gallery</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</li>
					<li class="dropdown">
					<a href="#" class="dropbtn">more...</a>
					<div class="dropdown-content">
						<a href="mypage1-p.php" id="headlink">profile</a>
						<a href="trivia-p.php" id="headlink">trivia</a>
						<a href="form-home.php" id="headlink">form</a>
					</div>
				</li>
			</ul>
		</div>
		
		<hr size="3px" width="58%" color="black">
		<hr	size="3px" width="58%" color="black">
		
		<h1 style="font-size:60px;margin-top:25px">ADD DATA</h1>
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
				<input type="radio" name="gender" value="female" title="Female">&nbsp;<img src="female.png" style="width:15px;height:25.5px" title="Female">
				<input type="radio" name="gender" value="male" title="Male"><img src="male.png" style="width:30px;height:30px" title="Male">
				<br><br>
				Mobile: <span class="error">* <?php echo $mobileErr;?></span><br>
				<input type="text" name="mobile" placeholder="Mobile Num" required>
				<br><br>
				Comment: <br>
				<textarea name="comment" placeholder="insert comment here" rows="3" cols="30"></textarea>
			</p>
			<button type="submit" name="btn-save"><strong>SAVE</strong>
			</form>
		</div>

		<p style="text-align:center">
			<img src="jolteon-m.gif" alt="pokemon-gif" style="width120px;height:120px">
			<img src="donut.png" alt="donut" style="width:120px;height:120px">
			<img src="donut.png" alt="donut" style="width:120px;height:120px">
			<img src="donut.png" alt="donut" style="width:120px;height:120px">
			<img src="jolteon.gif" alt="pokemon-gif" style="width:120px;height:120px">
		</p>
		
		<br>
		<hr>

		<div>
			<p style="text-align:center; font-family:quicksand; font-size: 20; color:black">- - - Jimenez, Marc Adrian P. | BSCS-CN151 | APC - - -</p>
			<p style="text-align:center; margin-top:0.5em">
				<a href="https://www.facebook.com/jumanjimenez" target="_blank"><img src="facebook.jpg" alt= "facebook"style="width:60px;height:60px"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="https://twitter.com/_eydriyan" target="_blank"><img src="twitter.jpg" alt="twitter" style="width:60px; height:60px"></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="https://www.instagram.com/_eydriyuhn/" target="_blank"><img src="instagram.jpg" alt="instagram" style="width:60px; height:60px"></a> .
			</p>
		</div>
	</body>
</html>