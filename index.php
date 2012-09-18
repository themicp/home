<?php
	include '/core/db.php';
	include '/core/settheme.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<title>My Home Page</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="My Home Page" />
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<?php
		// Set theme's styles
		echo '<link rel="stylesheet" type="text/css" href="'.$themepath.'style.css" />';
		?>
	</head>
	
	<body>
		<h1>Experimental Homepage</h1>
		
		<div id="left">
			
			<?php
				include '/core/bookmarks.php';
				include '/core/rss.php';
				include '/core/settings.php';
			?>			
			
		</div>
		
		<div id="right">
			<?php
				include '/core/search.php';
				include '/core/music.php';
			?>
		</div>
		
		
		<div id="showcase"></div>
		
		<!-- The scripts -->
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jqueryui.js"></script>
		<script type="text/javascript" src="js/core.js"></script>
		<script type="text/javascript" src="js/effects.js"></script>
		
	</body>
	
</html>