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

  <tr>
    <td><h1 align="center" class="heading">Add new student</h1>
      <p align="center">&nbsp;</p>
      <center><form id="form1" name="form1" method="get" action="insert2.php">
        <table align="center" width="291" border="0">
          <tr>
            <td><strong>Roll No. :</strong></td>
            <td><input type="text" name="rollno" id="textfield2" /></td>
          </tr>
          <tr>
		  <td width="129"><strong>Name of Student:</strong></td>
            <td width="152"><label>
              <input type="text" name="name" id="textfield" />
            </label></td>
            
          </tr>
          <tr>
            <td><strong>Percentage Obtain</strong></td>
            <td><input type="text" name="reg" id="textfield3" /></td>
          </tr>
          <tr>
            <td><strong>Department Name</strong>:</td>
            <td><input type="text" name="dept" id="textfield4" /></td>
          </tr>
        </table>
        <p align="center">
          <label>
            <input type="submit" name="button" id="button" value="Submit" />
        

        </p>
       
    

  </tr>
</table>

</td>
</tr>
  </form></center>
</body>
</html>