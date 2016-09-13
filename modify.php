<!DOCTYPE html>

<html lang="en"><head>
		<meta charset="UTF-8">
		<title>Modify</title>
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
<table align="center" cellpadding="0" width="800" >
  <tr>
    <td><h1 align="center" class="heading">Update Student Information</h1>
      <p align="center">
    <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM students";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"0\" width=\"70%\">
		<tr>
		<td><b>Name</b></td> <td><b>Roll No.</b></td><td><b>Percentage</b></td><td><b>Deparment</b></td><td><b>Action</b></td></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>
	<a href=\"modify2.php?id=".$result[0]."\">Modify</a>
	</td></tr>";
	} echo "</table>";
	 ?>

      </p>
 
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>