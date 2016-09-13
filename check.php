<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("studify",$con);
$userid=$_POST["userid"];
$password=$_POST["password"];
$sql="SELECT * FROM LOGIN WHERE USERID='$userid' AND PASSWORD='$password'";
$result=mysql_query($sql);
if(mysql_num_rows($result) > 0)
{
header('Location:index.html');
echo"login success";
}
else
{
echo"Wrong User";
}
?>