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