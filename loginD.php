 <!DOCTYPE html>

<html lang="en"><head>
		<meta charset="UTF-8">
		<title>Login</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
<script src="js/jquery.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/skel-layers.min.js"></script>
<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
</head>
	<body>
	
<header id="header">
  <h1><a href="index.html">Studify</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="lectures.html">Lectures</a></li>
							<li><a href="performance.Php">Student Info</a></li>
                         <li><a href="forum.php">Forums</a></li>
						
				  </ul>
				</nav>
			</header>
<center>

<?php
ob_start();

include("configD.php"); 

$link = mysql_connect($server, $db_user, $db_pass) 
or die ("Could not connect to mysql because ".mysql_error()); 

mysql_select_db($database) 
or die ("Could not select database because ".mysql_error()); 

$match = "select id from $table where username = '".$_POST['username']."' 
and password = '".$_POST['password']."';"; 

$qry = mysql_query($match) 
or die ("Could not match data because ".mysql_error()); 
$num_rows = mysql_num_rows($qry); 

if ($num_rows <= 0) { 

		
echo  '<span style="color:#000000;text-align:center;"><b>Sorry, there is no username with the specified password.<br></span>'; 
echo "<a href=index.html><b>Try again</a>"; 
exit; 
} else { 

setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("mysite_username", "$username");


echo '<span style="color:#000000;text-align:center;"><b>You are now logged in!<br></span>';
echo '<p style="color: red; text-align: center">
      <a href=indexd.php><b>continue...</a>  
      </p>';




}
ob_end_flush();
?>
</th>
</tr>
</td>
</tr>
 </b></center>
 </body>
 </html>