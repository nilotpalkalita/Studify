<!DOCTYPE html>

<html lang="en"><head>
		<meta charset="UTF-8">
		<title>Insert</title>
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

<table>
  <tr>
    <td><h1 align="center" class="heading">Result Report</h1>
      <p align="center">
	  
	 <?php
	
//session_start();
//$uname = mysql_real_escape_string(trim($_POST['name']));
//$rollno = mysql_real_escape_string(trim($_POST['rollno']));
//$reg = mysql_real_escape_string(trim($_POST['reg']));
//$dept = mysql_real_escape_string(trim($_POST['dept']));

//if (Empty($_POST[$uname])) {
//echo "Empty Field Name! ...  <a href=insert.php><b>Try again</a> ";exit;}
//echo "Empty Field Name! ...  ";exit;}
//elseif (Empty($_POST[$rollno])) {
//echo "Empty Field ID no.! ...   ";exit;}
//elseif (Empty($_POST[$reg])) {
//echo "Empty Field School year! ...  ";exit;}
//elseif (Empty($_POST[$dept])) {
//echo "Empty Field Department name.! ...   ";exit;}
//elseif(is_numeric($_POST[$name])){
//echo "<b>Accepts only Letters for Name!! ....";exit;}
//elseif(!is_numeric($_POST[$rollno])){
//echo "<b>Accepts only Numbers for ID no.!! ....  ";exit;}
//elseif(is_numeric($_POST[$dept])){
//echo "<b>Accepts only Letters for Department Name!! .... ";exit;}

?>
	  
	  
	  
    <?php 
	 $sname=$_REQUEST['name']; 
	 $roll=$_REQUEST['rollno'];
	 $reg=$_REQUEST['reg'];
	 $dept=$_REQUEST['dept']; 
	 
	 //elseif (($_POST[password]) <> ($_POST[password1])) {
	  //if ((Empty($_GET[name])) or (Empty($_GET[rollno])) or (Empty($_GET[reg])) or (Empty($_GET[dept]))){
//echo "Some fields are Empty!! <a href=insert.php><b>Try again</a> ";exit;}
if (Empty($_GET[rollno])) {
echo "Empty Field ID no.! ...  <a href=insert.php><b>Try again</a> ";exit;}	
elseif(!is_numeric($_GET[rollno])){
echo "<b>Accepts only Numbers for ID no.!! .... <a href=insert.php><b>Try again</a> ";exit;}
	elseif (Empty($_GET[name])) {
echo "Empty Field Name! ...  <a href=insert.php><b>Try again</a> ";exit;}

elseif (Empty($_GET[reg])) {
echo "Empty Field School year! ...  <a href=insert.php><b>Try again</a> ";exit;}
elseif (Empty($_GET[dept])) {
echo "Empty Field Department name.! ...  <a href=insert.php><b>Try again</a> ";exit;}
elseif(is_numeric($_GET[name])){
echo "<b>Accepts only Letters for Name!! .... <a href=insert.php><b>Try again</a> ";exit;}

elseif(is_numeric($_GET[dept])){
echo "<b>Accepts only Letters for Department Name!! .... <a href=insert.php><b>Try again</a> ";exit;}

	 
	 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="INSERT INTO students (sname, rollno, regno, dname) values('".$sname."', '".$roll."', '".$reg."', '".$dept."')";
		
		  if(!mysql_query($query,$link))
		  {die ("An unexpected error occured while saving the record, Please try again!");}
		  else
		 {
		  echo "New record saved successfully!";}
	 ?>

      </p>
      <p align="center"> <a href="insert.php">Back</a>
	  <a href="performance.php">Info Home</a></p>
    </td>
  </tr>
</table>

</td>
</tr>
</body>
</html>