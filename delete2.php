<!DOCTYPE html>

<html lang="en"><head>
		<meta charset="UTF-8">
		<title>Delete</title>
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
<br />
<br />
<br />
<table>
  <tr>
    <td><h1 align="center" class="heading">&nbsp;</h1>
  <p align="center">
    <?php 
	 $id=$_REQUEST['id']; 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="DELETE FROM students WHERE id='".$id."'";
		
		  if(!mysql_query($query,$link))
		  {die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");}
		  else
		 {
		  echo "<b>Record number ".$id.", removed successfully!";}
	 ?>
      </p>
      <p align="center"><a href="delete.php">Back</a>
	  
	  <a href="performance.php">Info Home</p>
      <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p></td>
  </tr>
</table>
</td>
</tr>
</body>
</html>