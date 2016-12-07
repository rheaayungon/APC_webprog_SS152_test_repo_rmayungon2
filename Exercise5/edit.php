<?php
	include_once 'dbconfig.php';
	$first_nameErr = $last_nameErr = $nicknameErr = $emailErr = $city_nameErr = $genderErr = $mobileErr = $commentErr = "";
	if(isset($_GET['edit_id'])){
		$sql_query="SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
		$result_set=mysqli_query($con,$sql_query);
		$fetched_row=mysqli_fetch_array($result_set);
	}
	if(isset($_POST['btn-update'])){
		$error = "";
		$first_name = test_input($_POST["first_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z- ]*$/",$first_name)) {
			$first_nameErr = "<br>Only letters and white space allowed";
			$first_name = "";
			$error = "firstname";
		}
		
		$last_name = test_input($_POST["last_name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
			$last_nameErr = "<br>Only letters and white space allowed";
			$last_name = "";
			$error = "lastname";
		}
		
	  	$nickname = test_input($_POST["nickname"]);
	  	if (!preg_match("/^[a-zA-Z ]*$/",$nickname)) {
			$nicknameErr = "<br>Only letters and white space allowed";
			$nickname = "";
			$error = "nickname";
		}
		
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "<br>Invalid email format";
			$email = "";
			$error = "email";
		}
		
		$city_name = test_input($_POST["city_name"]);
		
		$comment = test_input($_POST["comment"]);
		
		$gender = test_input($_POST["gender"]);
		
		$mobile = test_input($_POST["mobile"]);
		
		if(!preg_match("/^[0-9-]*$/",$mobile)){
			$mobileErr = " <br>Only numbers are allowed";
			$mobile = "";
			$error = "mobile";
		}
		if($error === ""){
			// sql query for update data into database
			$sql_query = "UPDATE users SET first_name='$first_name',last_name='$last_name',nickname ='$nickname', email='$email',  user_city='$city_name', gender='$gender', mobile='$mobile', comment = '$comment' WHERE user_id=".$_GET['edit_id'];
			// sql query for update data into database
			// sql query execution function
			if(mysqli_query($con,$sql_query))
			{
			?>
				<script type="text/javascript">
				alert('Data Are Updated Successfully');
				window.location.href='form-home.php';
				</script>
			<?php
			}else{
			?>
				<script type="text/javascript">
				alert('error occured while updating data');
				</script>
			<?php
			}
			// sql query execution function
		}
	}
	if(isset($_POST['btn-cancel'])){
		header("Location: form-home.php");
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
			padding-top: 50px;
		}
		.error {color: #FF0000;}
	</style>
	<script type="text/javascript">
		function edt_id(id)
		{
		 if(confirm('Sure to edit ?'))
		 {
		  window.location.href='edit.php?edit_id='+id;
		 }
		}
		function delete_id(id)
		{
		 if(confirm('Sure to Delete ?'))
		 {
		  window.location.href='form-home.php?delete_id='+id;
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
			<a href="Form.php" targertsel>PHP Form </center></a>
		<hr width="60%">
		<hr width="60%">

		<div class="transbox"
		<h1 style="font-size:60px"> EDIT ENTRY </h1>
		<div class="transbox">
			<form method="post">
				<p>
					First Name: <span class="error">* <?php echo $first_nameErr;?></span><br>
					<input type="text" name="first_name" placeholder="First Name" value="<?php echo $fetched_row['first_name']; ?>" required>
					<br><br>
					Last Name: <span class="error">* <?php echo $last_nameErr;?></span><br>
					<input type="text" name="last_name" placeholder="Last Name" value="<?php echo $fetched_row['last_name']; ?>" required>
					<br><br>
					Nickname: <span class="error">* <?php echo $nicknameErr;?></span><br>
					<input type="text" name="nickname" placeholder="Nickname" value="<?php echo $fetched_row['nickname']; ?>" required>
					<br><br>
					Email: <span class="error">* <?php echo $emailErr;?></span><br>
					<input type="text" name="email" placeholder="Email Address" value="<?php echo $fetched_row['email']; ?>" required>
					<br><br>
					Home: <br>
					<input type="text" name="city_name" placeholder="City"  value="<?php echo $fetched_row['user_city']; ?>" required>
					<br><br>
					Gender: <br>
					<input type="radio" name="gender" <?php if ($fetched_row['gender']=="Female") echo "checked";?> value="Female">&nbsp;<img src="female.png" style="width:15px;height:25.5px" title="Female">
					<input type="radio" name="gender" <?php if ($fetched_row['gender']=="Male") echo "checked";?> value="Male" title="Male"><img src="male.png" style="width:30px;height:30px" title="Male">
					<br><br>
					Mobile: <span class="error">* <?php echo $mobileErr;?></span><br>
					<input type="text" name="mobile" placeholder="Mobile Num" value="<?php echo $fetched_row['mobile']; ?>" required>
					<br><br>
					Comment: <br>
					<textarea name="comment" placeholder="insert comment here" rows="3" cols="30" value="<?php echo $fetched_row['comment']; ?>"><?php echo $fetched_row['comment']; ?></textarea>
					<br>
					<br>
					<button type="submit" name="btn-update"><strong>UPDATE</strong></button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
				  </p>
			</form>
		</div>
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