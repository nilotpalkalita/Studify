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
<table>
  <tr>
    <td><h1 align="center" class="heading">Updating Records</h1>
      <p align="center">
    <?php 
	 $id=$_REQUEST['id']; 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("department",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM students WHERE id='".$id."'";
		
		 $resource=mysql_query($query,$link) or die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");
		  $result=mysql_fetch_array($resource);
		  
	 ?>
     <form id="form1" name="form1" method="get" action="modify3.php">
        <table align="center" width="291" border="0">
          <tr>
            <td width="129"><strong>Name of Student:</strong></td>
            <td width="152">
            <input type="hidden" name="id" value="<?php echo $result[0] ?>"  />
            <label>
              <input name="name" type="text" id="textfield" value="<?php echo $result[1] ?>" />
            </label></td>
          </tr>
          <tr>
            <td><strong>Roll No. :</strong></td>
            <td><input name="rollno" type="text" id="textfield2" value="<?php echo $result[2] ?>" /></td>
          </tr>
          <tr>
            <td><strong>Percentage:</strong></td>
            <td><input type="text" name="reg" id="textfield3" value="<?php echo $result[3] ?>" /></td>
          </tr>
          <tr>
            <td><strong>Department Name</strong>:</td>
            <td><input type="text" name="dept" id="textfield4" value="<?php echo $result[4] ?>" /></td>
          </tr>
        </table>
        <p align="center">
          <label>
            <input type="submit" name="button" id="button" value="Update" />
          </label>
        </p>
        
      </form>

      </p>
      <p align="center"><a href="delete.php"><a href="../"></a></p>
    </td>
  </tr>
</table>
<h1 align="center" class="heading">&nbsp;</h1>
</body>
</html>