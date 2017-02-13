<?php 
	session_start(); 
	require("includes/420DB.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Northeast Car Audio - Powered by SR Technologies.</title>
<link href="includes/style.css" rel="stylesheet" type="text/css" />
</head>
<?php #Free Template by Templatefusion.org ?>
<body>

	<?php
	
		$con = getDBConnection();
	
		if(	!empty($_SESSION['userName']))
		{
			$userName = $_SESSION['userName'];
			$teamID = $_SESSION['teamID'];
		}
		
	?>

	<div id="wrap">

		<div class="header"><p>Northeast<span>Car Audio</span><sup>No one is this Loud.</sup></p>
		</div>
		
<div id="navigation">
			<ul class="glossymenu">
			<?php
			
				$nav_links = getNavigation($con);
				while($row = mysql_fetch_array( $nav_links ))
				{
					echo("<li><a href=\"" . $row['Link'] . "\" class=\"current\"><b>" . $row['Name'] . "</b></a></li>");
				}
			?>
			</ul>
		</div>
	  <div id="body">
		<br><br>
		
		<h1>7-29-08</h1>
			<p>Hi guys, thanks for visiting the new Northeast Car Audio website.  I have migrated all of the albums over from the old website, check 'em out when you get a chance.  I am also in the process of a creating a tool so that images can be uploaded to the site (or uploaded to a remote location and linked here).  The next thing, however, will be a profiles section where members of the Northeast community ,and potentially others, will be able to create and maintain a profile of their own.  Check back in a couple weeks to see the updates.</p>
			
		<br><br>			
		
		<h1>7-22-08</h1>
			<p>Northeast Car Audio has been officially revived at <a href="http://www.rehlander.com">rehlander.com</a>.  This site is a place to view competitor profiles, research setups used in some of the best SPL setups in the world and view pictures taken by friends and family of Team 420.  Grabbing info from the old site to post here will be a continual work in progress.  There are tons of pictures at the <a href="http://www.northeastcaraudio.com/old">old northeastcaraudio.com</a> website.  I will throw some forums up at some time in the future and maybe even revive the failed SPLFantasy web application.  Please help support SR Technologies by referring us to a friend who may need a professional website or custom database application for their small business.  Thanks!  Enjoy your visit and stay loud.</p>
		
		<br><br>
		<br><br>
            
		</div>
		
		<div id="footer">&copy;2008 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
