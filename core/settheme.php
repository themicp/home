<?php
	$acceptedThemes = array( 'dark' , 'default' );
	
	if ( isset( $_POST['theme'] ) ) {
		$theme = $_POST['theme'];
		
		if ( !in_array( $theme , $acceptedThemes ) )
			$theme = "default";
	}
	else
		$theme = 'dark';
	// Setting variables
	$themepath = "./styles/".$theme."/";
	$imagespath = $themepath."images/";
?>