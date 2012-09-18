<?php
	include '../../core/db.php';

	if ( !isset($_POST) ) {
		header( 'Location: http://localhost/home' );
		exit;
	}
	
	$title = $_POST["bmtitle"];
	$descr = $_POST["bmdescr"];
	$link = $_POST["bmlink"];
	$group = $_POST["bmgroup"];
	
	if ( ( $title == "" ) || ($link == "") ) {
		header( 'Location: http://localhost/home' );
		echo "No values";
		exit;
	}
	
	/* Seems right to store the data in the database */
	$store = mysql_query( "
					INSERT INTO
						bookmarks
					VALUES
						('$title', '$descr', '$link', $group )
	");
	
	header( 'Location: http://localhost/home' );
	exit;
?>