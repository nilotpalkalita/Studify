<?php

include ("configD.php");


$link = mysql_connect($server, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

mysql_select_db($database)
or die ("Could not select database because ".mysql_error());

$create = "create table $table (
id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL default '',
password varchar(32) NOT NULL default '',
PRIMARY KEY (id),
UNIQUE KEY username (username)
);";

mysql_query($create)
or die ("Could not create tables because ".mysql_error());
echo "Complete.";
?>