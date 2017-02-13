<?php 
	session_start(); 
	require("includes/420DB.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Scott Rehlander</title>
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

			<?php
	
		// If we have already posted an album name
		if(!empty($_GET["album"]))
		{
			echo("<center>");
			echo("<table class=\"mainTable\"><tr>");
			echo("<br><br>");
			
			$MAX_ROW_COUNT = 10;
			$MAX_COL_COUNT = 4;
			$picsPerPage = $MAX_ROW_COUNT * $MAX_COL_COUNT;
			
			$colCount = 0;
			$rowCount = 0;
			$picCount = 0;
			$startPic = 0;
			$stop = true;
	
			if(!empty($_GET["page"]))
				$startPic = ($_GET["page"] - 1) * $picsPerPage;
	
			$directory = opendir($_GET["album"]);
						
			while($filename = readdir($directory))
			{
				if($startPic == $picCount)
					$stop = false;
			
				if($colCount == $MAX_COL_COUNT)
				{
					echo("</tr><tr>");
					$colCount = 0;
					$rowCount++;
					if($rowCount == $MAX_ROW_COUNT)
						$stop = true;
				}
		
				if(!(stristr($filename, '.thumb.') == FALSE))
				{
					$picCount++;
					if(!$stop)
					{
						$nonThumb = substr($filename, 0, strlen($filename) - 10);
						$nonThumbExt = substr($filename, strlen($filename) - 4, 4);
						$nonThumb = $nonThumb . $nonThumbExt;
						
						echo("<td><a href=\"" . $_GET["album"] . "/" . $nonThumb . "\"><img border=0 src=\"" . $_GET["album"] . "/" . $filename . "\"></a></td>");
						$colCount++;
					}
				}
			}
			closedir($directory);
	
			echo("</tr></table>");
			
			$numOfTables = ($picCount / $picsPerPage) + 1;
			$page = 1;
			if(!empty($_GET["page"]))
				$page = $_GET["page"];
	
			echo("<p align=\"center\"><font size=2>");
			
			if($page > 1)
			{
				$newPage = $page - 1;
				echo(" <a class=\"invert\" href=\"AlbumViewer.php?album=" . $_GET["album"] . "&page=" . $newPage . "\">Prev::</a>  "); 
			}
			for($i = 1; $i <= $numOfTables; $i++)
			{
				if($page != $i)
					echo("<a class=\"invert\" href=\"AlbumViewer.php?page=$i&album=" . $_GET['album'] . "\">$i</a> ");
				else
					echo("$i ");
			}
			if($page < $numOfTables - 1)
			{
				$newPage = $page + 1;
				echo(" <a class=\"invert\" href=\"AlbumViewer.php?album=" . $_GET["album"] . "&page=" . $newPage . "\"> ::Next</a>");
			}
			
			echo("</font></p><br><br>");
			echo("</center>");
		}
		else
		{ // We need to show a list of albums to the user
			$MAX_COL = 3;
		
			$result = mysql_query("SELECT * FROM Albums", $con) or die(mysql_error());
			echo("<center><br><br>");
			echo("<table class=\"mainTable\">");
			
			$even = false;
			while($row = mysql_fetch_array($result))
			{
				if($even)
					echo("<tr><td align=\"center\" width = 50%><img height=100px width=150px src=\"" . $row["Directory"] . "/" . $row["Picture"] . "\"></td><td align=\"center\"  width = 50%><a class=\"invert\" href=\"AlbumViewer.php?album=" . $row["Directory"] . "\">" . $row["AlbumName"] . "</a></td></tr>");
				else
				{
					//echo("<tr class=\"contentTableRowInvert\"><td align=\"center\" ><a class=\"invert\" href=\"AlbumViewer.php?album=" . $row["Directory"] . "\">" . $row["AlbumName"] . "</a></td><td align=\"center\" ><img height=100px width=150px src=\"" . $row["Directory"] . "/" . $row["Picture"] . "\"></td></tr>");
					echo("<tr class=\"contentTableRowInvert\">");
					
					for($i = 0; $i < $MAX_COL; $i++)
					{
						// We want to display a number of pictures per column
						if(!empty($row))
						{
							echo("<td align=\"center\" ><img height=100px width=150px src=\"" . $row["Directory"] . "/" . $row["Picture"] . "\"><br><br><a class=\"invert\" href=\"AlbumViewer.php?album=" . $row["Directory"] . "\">" . $row["AlbumName"] . "</a><br> </td>");
						}
						
						// If this is not the last iteration
						if($i != $MAX_COL)
						{
							// Get the next row and check if it exists
							$row = mysql_fetch_array($result);
							if(empty($row))
							{
								$i = $MAX_COL + 1;
							}
						}
					}
					echo("</tr>");
				}
					
				//$even = !$even;	
			}
			echo("</table><br><br>");
			echo("</center>");
		}

	
	
	?>  
		
		</div>
		
		<div id="footer">&copy;2008 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
