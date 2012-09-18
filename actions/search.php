<?php
	if (!isset( $_POST['search'] )) {
		include '../errors/blanksearch.php';
		exit;
	}
	
	if (!isset( $_POST['searchterm'] )) {
		include '..errors/blankq.php';
		exit;
	}
	
	$query = $_POST['searchterm'];
	$search = $_POST['search'];
	
	if ( $search == "google" ) {
		$spattern = "https://www.google.com/search?btnG=1&pws=0&q=";
		$url = $spattern.$query;
		header( "Location: $url" ) ;
		exit;
	}
	else if ( $search == "youtube" ) {
		$spattern = "http://www.youtube.com/results?search_query=";
		$url = $spattern.$query;
		header( "Location: $url" ) ;
		exit;
	}
	else if ( $search == "wikipedia" ) {
		$spattern = "http://en.wikipedia.org/w/index.php?search=";
		str_replace( " " , "+" , $query );
		$url = $spattern.$query;
		header( "Location: $url" ) ;
		exit;
	}
	else {
		include '..errors/blanksearch.php';
		exit;
	}
?>