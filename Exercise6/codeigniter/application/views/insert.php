<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		MIRIFICAL
	</title>
	<style>
		body{
			background-image: url("<?php echo base_url();?>img/bg.jpg");
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
</script>
	<body>
		<head>
			<div style="padding-left:445px; padding-right:500px;">
			<img src="<?php echo base_url();?>img/lips.png" style="padding-top:1%;position:absolute;align:center;opacity:1.0;filter:alpha(opacity=100)"></a>
			<img src="<?php echo base_url();?>img/img.png" alt="Calligraphy Fonts" style="padding-top:8%;position:relative;top:90;opacity:1.0;filter:alpha(opacity=100)"></a>
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
			<center><a href="<?php echo base_url();?>index.php" targertsel>HOME &nbsp;&nbsp; 
			<a href="<?php echo base_url();?>index.php/control/about" targertsel>ABOUT &nbsp;&nbsp; 
			<a href="<?php echo base_url();?>index.php/control/hobbies" targertsel>H & T &nbsp;&nbsp; 
			<a href="<?php echo base_url();?>index.php/control/trivia" targertsel>TRIVIA &nbsp;&nbsp; 
			<a href="<?php echo base_url();?>index.php/control/form" targertsel>PHP Form </center></a>
		<hr width="60%">
		<hr width="60%">
		<br>
		<h1 style="font-size:30px;margin-top:25px">ADD DATA</h1>
		<br>
		<div class="transbox" style="margin-top:-20px">
			<form method="post" action="<?php echo base_url();?>index.php/control/insert_users_db">
			<p><a href="<?php echo base_url();?>index.php/control/form"><strong>*back to main page*</strong></a> 
				<br>
				<br>
				First Name: <span class="error">*</span><br>
				<input type="text" name="first_name" placeholder="First Name" required>
				<br><br>
				Last Name: <span class="error">*</span><br>
				<input type="text" name="last_name" placeholder="Last Name" required>
				<br><br>
				Nickname: <span class="error">*</span><br>
				<input type="text" name="nickname" placeholder="Nickname" required>
				<br><br>
				Email: <span class="error">*</span><br>
				<input type="text" name="email" placeholder="Email Address" required>
				<br>
				<br>
				Home: <br>
				<input type="text" name="user_city" placeholder="City" required>
				<br><br>
				Gender: <br>
				<input type="radio" name="gender" value="female" title="Female">&nbsp;<img src="<?php echo base_url();?>img/female.png" style="width:35px;height:30px" title="Female">
				<input type="radio" name="gender" value="male" title="Male"><img src="<?php echo base_url();?>img/male.png" style="width:30px;height:30px" title="Male">
				<br><br>
				Mobile: <span class="error">*</span><br>
				<input type="text" name="mobile" placeholder="Mobile Num" required>
				<br><br>
				Comment: <br>
				<textarea name="comment" placeholder="insert comment here" rows="3" cols="30"></textarea>
			</p>
			<center><button type="submit" name="btn-save"><strong>SAVE</strong></button></center>
			</form>
		</div>

		<footer>
		<center>
		<hr width="70%">
		<hr width="70%">
			<b><p style="color:black;margin-top:7em;margin-bottom:0.1em;font-size:12px;font-family:courier">copyrights 2016</b></p>
			<center><p style="margin-top:0.1em;margin-bottom:0.1em">
				<a href="https://www.facebook.com/rheaayungon/"target="_blank"><img a src="<?php echo base_url();?>img/fblogo.png" style="width:50px;height:50px"></a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="https://www.instagram.com/rheaayungon/?hl=en"target="_blank"><img src="<?php echo base_url();?>img/iglogo.png" style="width:50px;height:50px;">&nbsp;
				<a href="https://www.twitter.com/rheaayungon/"target="_blank"><img src="<?php echo base_url();?>img/twitterlogo.png" style="width:52px;height:52px;">
				</a></center>
		</center>
	</footer>
	</body>
</html>