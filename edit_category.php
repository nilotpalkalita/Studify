<?php

include('config.php');
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
$dn1 = mysql_fetch_array(mysql_query('select count(id) as nb1, name, description from categories where id="'.$id.'" group by id'));
if($dn1['nb1']>0)
{
if(isset($_SESSION['username']) and $_SESSION['username']==$admin)
{
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
	<link rel="stylesheet" href="css/skel.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
        <title>Edit a category - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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
        <div class="content">
<?php
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> &gt; Edit the category
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
if(isset($_POST['name'], $_POST['description']) and $_POST['name']!='')
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	if(get_magic_quotes_gpc())
	{
		$name = stripslashes($name);
		$description = stripslashes($description);
	}
	$name = mysql_real_escape_string($name);
	$description = mysql_real_escape_string($description);
	if(mysql_query('update categories set name="'.$name.'", description="'.$description.'" where id="'.$id.'"'))
	{
	?>
	<div class="message">The category have successfully been edited..<br />
	<a href="<?php echo $url_home; ?>">Go to the forum index</a></div>
	<?php
	}
	else
	{
		echo 'An error occured while editing the category.';
	}
}
else
{
?>
<form action="edit_category.php?id=<?php echo $id; ?>" method="post">
	<label for="name">Name</label><input type="text" name="name" id="name" value="<?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?>" /><br />
	<label for="description">Description</label>(html enabled)<br />
    <textarea name="description" id="description" cols="70" rows="6"><?php echo htmlentities($dn1['description'], ENT_QUOTES, 'UTF-8'); ?></textarea><br />
    <input type="submit" value="Edit" />
</form>
<?php
}
?>
		</div>
		
	</body>
</html>
<?php
}
else
{
	echo '<h2>You must be logged as an administrator to access this page: <a href="login.php">Login</a> - <a href="signup.php">Sign Up</a></h2>';
}
}
else
{
	echo '<h2>The category you want to edit doesn\'t exist..</h2>';
}
}
else
{
	echo '<h2>The ID of the category you want to edit is not defined.</h2>';
}
?>