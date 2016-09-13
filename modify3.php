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
<br />
<br />
<br />
<table >
  <tr>
    <td><h1 align="center" class="heading">&nbsp;</h1>
  <p align="center">
    <?php 
	 $id=$_REQUEST['id'];
	 $sname=$_REQUEST['name']; 
	 $roll=$_REQUEST['rollno'];
	 $reg=$_REQUEST['reg'];
	 $dept=$_REQUEST['dept']; 
	 
	 
	 if (Empty($_GET[rollno])) {
echo "Empty Field ID no.! ...  <a href=modify.php><b>Try again</a> ";exit;}	
elseif(!is_numeric($_GET[rollno])){
echo "<b>Accepts only Numbers for Roll no.!! .... <a href=modify.php><b>Try again</a> ";exit;}
	elseif (Empty($_GET[id])) {
echo "Empty Field Name! ...  <a href=modify.php><b>Try again</a> ";exit;}

elseif (Empty($_GET[reg])) {
echo "Empty Field Percentage ...  <a href=modify.php><b>Try again</a> ";exit;}
elseif (Empty($_GET[dept])) {
echo "Empty Field Department name.! ...  <a href=modify.php><b>Try again</a> ";exit;}
elseif(is_numeric($_GET[id])){
echo "<b>Accepts only Letters for Name!! .... <a href=modify.php><b>Try again</a> ";exit;}

elseif(is_numeric($_GET[dept])){
echo "<b>Accepts only Letters for Department Name!! .... <a href=modify.php><b>Try again</a> ";exit;}

	 
	 
	 
	 
	 
	 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="UPDATE students SET sname='".$sname."', rollno='".$roll."', regno='".$reg."', dname='".$dept."' WHERE id='".$id."'";
		
		  if(!mysql_query($query,$link))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "<b>Record updated successfully!";}
	 ?>
      </p>
      <p align="center"><a href="modify.php"><img src="cooltext457951462MouseOver.png"  onmouseover="this.src='cooltext457951462.png';" onmouseout="this.src='cooltext457951462MouseOver.PNG';" width="95" height="50" border="0" align="bottom" />   </a>
	  <a href="../home.php"> <img src="cooltext457951615MouseOver.png"  onmouseover="this.src='cooltext457951615.png';" onmouseout="this.src='cooltext457951615MouseOver.PNG';" width="95" height="50" border="0" align="bottom" />   </a></p>
      <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p></td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>