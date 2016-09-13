<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Enrollment System</title>

</head>



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
		<td><b>Name</b></td> <td><b>I.D. No.</b></td><td><b>School Year</b></td><td><b>Deparment</b></td><td><b>Action</b></td></tr> ";
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