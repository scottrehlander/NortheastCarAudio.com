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
		<table class="mainTable"><tr><td>Album Name</td><td>Album Location</td><td>Action</td></tr>
		
		<?php
			$albums = getAlbums($con);
			while($row = mysql_fetch_array($albums))
			{
				echo("<tr><td>");
					echo($row["AlbumName"]);
					echo("  <a href=\"index.php\">[ edit ]</a>");
				echo("</td><td>");
					echo($row["Directory"]);
					echo("  <a href=\"index.php\">[ edit ]</a>");
				echo("</td><td>");
					echo("<img src=\"" . $row["Directory"] . "/" . $row["Picture"] . "\">");
					echo("<br><a href=\"index.php\">[ change ]</a>");
				echo("</td></tr>");
			}
		?>
		
		</table>
		<br><br>
		</div>
		
		<div id="footer">&copy;2008 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
