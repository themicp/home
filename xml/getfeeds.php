<?php
	if ( !isset( $_POST['s'] ) ) {
		$source = file_get_contents( "src.txt" );
	}
	else {
		$source = $_POST['s'];
	}
	
	if ( $feeds = file_get_contents( $source ) ) {
		/* SUCCESS */
		file_put_contents( "feed.xml" , $feeds );
		file_put_contents( "src.txt" , $source );
	}
?>