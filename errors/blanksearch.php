<?php
	include '../core/settheme.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<title>Error!</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="My Home Page" />
		<?php
		// Set theme's styles
		echo '<link rel="stylesheet" type="text/css" href="../'.$themepath.'error.css" />';
		?>
	</head>
	
	<body>
		<h1>You chose an invalid search machine</h1>
		Go <a href="..">back</a> to search again
	</body>
</html>