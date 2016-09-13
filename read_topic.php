<?php
include('config.php');
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
	$dn1 = mysql_fetch_array(mysql_query('select count(t.id) as nb1, t.title, t.parent, count(t2.id) as nb2, c.name from topics as t, topics as t2, categories as c where t.id="'.$id.'" and t.id2=1 and t2.id="'.$id.'" and c.id=t.parent group by t.id'));
if($dn1['nb1']>0)
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


        <title><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?> - Forum</title>
    </head>
    <body>
    	<header id="header">
	     <h1><a href="index.html">Studify</a></h1>
		<nav id="nav">
		<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="lectures.html">Lectures</a></li>
		<li><a href="performance.html">Performance</a></li>
        <li><a href="forum.php">Forums</a></li>
						
		 </ul>
		</nav>
		</header>
        <div class="content">
<?php
if(isset($_SESSION['username']))
{
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Read the topic
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
    <div class="clean"></div>
</div>
<?php
}
else
{
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a> &gt; <a href="list_topics.php?parent=<?php echo $dn1['parent']; ?>"><?php echo htmlentities($dn1['name'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; <a href="read_topic.php?id=<?php echo $id; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a> &gt; Read the topic
    </div>
	<div class="box_right">
    	<a href="signup.php">Sign Up</a> - <a href="login.php">Login</a>
    </div>
    <div class="clean"></div>
</div>
<?php
}
?>
<h1><?php echo $dn1['title']; ?></h1>
<?php
if(isset($_SESSION['username']))
{
?>
	
<?php
}
$dn2 = mysql_query('select t.id2, t.authorid, t.message, t.timestamp, u.username as author, u.avatar from topics as t, users as u where t.id="'.$id.'" and u.id=t.authorid order by t.timestamp asc');
?>
<table class="messages_table">
	<tr>
    	<th class="author">Author</th>
    	<th>Message</th>
	</tr>
<?php
while($dnn2 = mysql_fetch_array($dn2))
{
?>
	<tr>
    	<td class="author center"><?php
if($dnn2['avatar']!='')
{
	echo '<img src="'.htmlentities($dnn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}
?><br /><a href="profile.php?id=<?php echo $dnn2['authorid']; ?>"><?php echo $dnn2['author']; ?></a></td>
    	<td class="left"><?php if(isset($_SESSION['username']) and ($_SESSION['username']==$dnn2['author'] or $_SESSION['username']==$admin)){ ?><div class="edit"><a href="edit_message.php?id=<?php echo $id; ?>&id2=<?php echo $dnn2['id2']; ?>"><img src="<?php echo $design; ?>/images/edit.png" alt="Edit" /></a></div><?php } ?><div class="date">Date sent: <?php echo date('Y/m/d H:i:s' ,$dnn2['timestamp']); ?></div>
        <div class="clean"></div>
    	<?php echo $dnn2['message']; ?></td>
    </tr>
<?php
}
?>
</table>
<?php
if(isset($_SESSION['username']))
{
?>
	<a href="new_reply.php?id=<?php echo $id; ?>" class="button">Reply</a>
<?php
}
else
{
?>
<div class="box_login">
	<form action="login.php" method="post">
		<label for="username">Username</label><input type="text" name="username" id="username" /><br />
		<label for="password">Password</label><input type="password" name="password" id="password" /><br />
        <label for="memorize">Remember</label><input type="checkbox" name="memorize" id="memorize" value="yes" />
        <div class="center">
	        <input type="submit" value="Login" /> <input type="button" onclick="javascript:document.location='signup.php';" value="Sign Up" />
        </div>
    </form>
</div>
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
	echo '<h2>This topic doesn\'t exist.</h2>';
}
}
else
{
	echo '<h2>The ID of this topic is not defined.</h2>';
}
?>