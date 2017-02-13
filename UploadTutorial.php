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
		
		<h2>Upload tutorial</h2>
		<p>	
		1.) You will need to download a couple programs.<br><br>
		<a href="http://www.fookes.com/ftp/free/EzThmb_Setup.exe">Easy Thumbnail Creator</a> - This is a program that creates thumbnails.  This application makes small pictures that will load quickly so that people can easily see what's in the album. <br><br>
		<a href="http://downloads.sourceforge.net/filezilla/FileZilla_3.1.0.1_win32-setup.exe">Filezilla FTP Client</a> - This is a program that will allow you to upload files to the website.<br><br>
		
		2.) Open Easy Thumbnail Creator and create thumbnals.<br><br>
		
		3.) Open FileZilla, navigate to the FTP site and upload the directory.<br><br>
		
		4.) Go to the album manager to name and link your albums.
		</p>
		<br><br>
            
		</div>
		
		<div id="footer">&copy;2008 All Rights Reserved &bull; Scott Rehlander &nbsp;&bull;&nbsp; Best viewed using Internet Explorer 7.0 </div>

</div>

</body>
</html>
