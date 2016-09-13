<?php

include('config.php');
?>
<!DOCTYPE html>

<html >
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
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
	<body class="landing">

		
			<header id="header">
				<h1><a href="index.html">Studify</a></h1>
				<nav id="nav">
					<ul>
						
						<li><a href="lectures.html">Lectures</a></li>
						<li><a href="performance.html">Performance</a></li>
                         <li><a href="forum.php">Forums</a></li>
						
					</ul>
				</nav>
			</header>
<?php
if(isset($_SESSION['username']))
{
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
$nb_new_pm = $nb_new_pm['nb_new_pm'];
?>
<div class="box">
	<div class="box_left">
    	<a href="<?php echo $url_home; ?>">Forum Index</a>
    </div>
	<div class="box_right">
    	<a href="list_pm.php">Your messages(<?php echo $nb_new_pm; ?>)</a> - <a href="profile.php?id=<?php echo $_SESSION['userid']; ?>"><?php echo htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></a> (<a href="login.php">Logout</a>)
    </div>
	<div class="clean"></div>
</div>
?<

		
			<section id="banner">
				<h2>Studify</h2>
				<p>Teachers and Students 
                <br>Interact and Collaborate</p>
                
                
				
			</section>

		
			
				

		
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Get Started Today!</h2>
						</header>
					<section class="profiles">
						<div class="row">
							<section class="4u 6u(medium) 12u$(xsmall) profile">
								<img src="images/bhikk.jpg" alt="" />
								<h4>Nilotpal Kalita</h4>
								<p>Project Designer</p>
							</section>
							<section class="4u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/prantik.jpg" alt="" />
								<h4>Prantik Baishya</h4>
								<p>Project Designer</p>
							</section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/joon.jpg" alt="" />
								<h4>Shovajeet Baruah</h4>
								<p>Project Designer</p>
							</section>
							
						</div>
					</section>
					<footer>
						
						<ul class="actions">
							<li>
								<a href="http://fb.com/dustbytes" class="button big">Contact Us</a>
							</li>
						</ul>
					</footer>
				</div>
			</section>

		

	
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li id="main">&copy; Studify 2016. All rights reserved.</li>
								
							</ul>
						</div>
						
					</div>
				</div>
			</footer>

	</body>
</html>
