<?php
include_once 'dbconfig.php';
// delete condition
if(isset($_GET['delete_id']))
{
 $sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
 mysqli_query($con,$sql_query);
 header("Location: $_SERVER[PHP_SELF]");
}
// delete condition
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
    table {
      font-family: quicksand;
      width: 100%;
      font-size: 15;
      padding-left: 50;
      padding-right: 50;
    }
    th{
      background:#FFD1DC;
    }
    td, th {
      border: 3px solid #000000;
      text-align: left;
      padding: 5px;
    }
    td{
      background-color: rgba(255,255,255,.5);
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
		    if(confirm('Edit this entry?'))
		  {
		    window.location.href='edit.php?edit_id='+id;
		  }
		  }
		  function delete_id(id)
		  {
		  if(confirm('Delete this entry?'))
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
		<h1 style="font-size: 60px;margin-top:25px"> FORM INDEX </h1>
		<table cellspacing="7" style="margin-top: -20px">
			<tr><center>
				<th style="font-size:20"><b>Name</b></th>
				<th style="font-size:20"><b>Nickname</b></th>
				<th style="font-size:20"><b>E-mail</th>
				<th style="font-size:20"><b>Home</b></th>
				<th style="font-size:20"><b>Gender</th>
				<th style="font-size:20"><b>Mobile</th>
				<th style="font-size:20"><b>Comment</th>
				<th style="font-size:20" colspan="2"><b>etc..</b></th>
			</center></tr>
			<?php
				$sql_query="SELECT * FROM users";
				$result_set=mysqli_query($con,$sql_query);
				while($row=mysqli_fetch_row($result_set))
				{
			?>
				<tr>
					<td><b><?php echo $row[2],'</b>, ', $row[1]; ?></td>
					<!-- Name = First Name + Last Name -->
					<td><?php echo $row[3]; ?></td>
					<!-- Nickname -->
					<td><?php echo $row[4]; ?></td>
					<!-- Email -->
					<td><?php echo $row[5]; ?></td>
					<!-- Address -->
					<td><?php echo $row[6]; ?></td>
					<!-- Gender-->
					<td><?php echo $row[7]; ?></td>
					<!-- Mobile -->
					<td><?php echo $row[8]; ?></td>
					<!-- Comment -->
					<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="edit.png" style="width:30px;height:30px" title="edit" align="EDIT" onmouseover="this.src='edit-hover.png';" onmouseout="this.src='edit.png';"></a></td>
					<td class = "delete" align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="drop.png" style="width:30px;height:30px" title="delete" align="DELETE" onmouseover="this.src='drop-hover.png';" onmouseout="this.src='drop.png';"></a></td>
				</tr>
			<?php
			}
			?>
			<tr><td style="border:none; background:none">&nbsp;</td></tr>
			<tr>
				<th colspan="9" style="text-align:center" class = "add"><a href="add.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;add data here&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>
			</tr>
		</table>

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