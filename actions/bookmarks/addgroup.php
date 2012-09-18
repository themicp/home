<?php
	include '../../core/db.php';

	if ( !isset($_POST) ) {
		header( 'Location: http://localhost/home' );
		exit;
	}
	
	$name = $_POST["groupname"];
	
	if ( $name == "" ) {
		header( 'Location: http://localhost/home' );
		echo "No values";
		exit;
	}
	
	/* Seems right to store the data in the database */
	$store = mysql_query( "
					INSERT INTO  `home`.`bookmarksgroups` (
						`id` ,
						`name`
					)
					VALUES (
						NULL ,  '$name'
					)");
	
	header( 'Location: http://localhost/home' );
	exit;
?>