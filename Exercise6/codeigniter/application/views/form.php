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
function show_confirm(act,gotoid)
{
if(act=="edit")
var r=confirm("Edit this entry?");
else
var r=confirm("Delete this entry?");
if (r==true)
{
window.location="<?php echo base_url();?>index.php/control/"+act+"/"+gotoid;
}
}
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

    <h1 style="font-size: 60px;margin-top:25px"> FORM INDEX </h1>
    <table cellspacing="7" style="margin-top: -20px">
      <tr><center>
        <th style="font-size:20"><center><b>Name</b></center></th>
        <th style="font-size:20"><center><b>Nickname</b></center></th>
        <th style="font-size:20"><center><b>E-mail</b></center></th>
        <th style="font-size:20"><center><b>Home</b></center></th>
        <th style="font-size:20"><center><b>Gender</b></center></th>
        <th style="font-size:20"><center><b>Mobile</b></center></th>
        <th style="font-size:20"><center><b>Comment</b></center></th>
      </center></tr>
      <?php foreach ($user_list as $u_key){ ?>

      <tr>

        <td><b><?php echo $u_key->last_name; ?></b>, <?php echo $u_key->first_name; ?></td>

        <td><?php echo $u_key->nickname; ?></td>

        <td><?php echo $u_key->email; ?></td>

        <td><?php echo $u_key->user_city; ?></td>
        
        <td><?php echo $u_key->gender; ?></td>
        
        <td><?php echo $u_key->mobile; ?></td>
        
        <td><?php echo $u_key->comment; ?></td>

        <td width="40" align="left" ><a href="#" onClick="show_confirm('edit',<?php echo $u_key->user_id;?>)"><img src="<?php echo base_url();?>img/edit.png" style="width:30px;height:30px;" title="edit" align="EDIT""></a></td>

        <td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $u_key->user_id;?>)"><img src="<?php echo base_url();?>img/drop.png" style="width:30px;height:30px" title="delete" align="DELETE""></a></td>

      </tr>

<?php }?>
      <tr><td style="border:none; background:none">&nbsp;</td></tr>
      <tr>
        <th colspan="9" style="text-align:center" class = "add"><a href="<?php echo base_url();?>index.php/control/add_form"><center>add data here</center></a></th>
      </tr>
    </table>

  <br>
  <br>
  <br>
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