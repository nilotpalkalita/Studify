<?php
//This page let delete a topic
include('config.php');
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
if(isset($_SESSION['username']))
{
	$dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.title, t.parent, c.name from topics as t, categories as c where t.id="'.$id.'" and t.id2=1 and c.id=t.parent group by t.id'));
if($dn1['nb1']>0)
{
if($_SESSION['username']==$admin)
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
        <title>Delete a topic - <?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
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
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Delete the topic
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
if(isset($_POST['confirm']))
{
	if(mysql_query('delete from topics where id="'.$id.'"'))
	{
	?>
	<div class="message">The topic have successfully been deleted.<br />
	<a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>">Go to "<?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?>"</a></div>
	<?php
	}
	else
	{
		echo 'An error occured while deleting the topic.';
	}
}
else
{
?>
<form action="delete_topic.php?id=<?php echo $id; ?>" method="post">
	Are you sure you want to delete this topic?
    <input type="hidden" name="confirm" value="true" />
    <input type="submit" value="Yes" /> <input type="button" value="No" onclick="javascript:history.go(-1);" />
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
	echo '<h2>You don\'t have the right to delete this topic.</h2>';
}
}
else
{
	echo '<h2>The topic you want to delete doesn\'t exist.</h2>';
}
}
else
{
	echo '<h2>You must be logged as an administrator to access this page: <a href="login.php">Login</a> - <a href="signup.php">Sign Up</a></h2>';
}
}
else
{
	echo '<h2>The ID of the topic you want to delete is not defined.</h2>';
}
?>