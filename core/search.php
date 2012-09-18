<div id="search" class="elem">
	<h2>Search</h2>
		<form method="post" action="actions/search.php">
			<div id="soptions">
				<div>
					<input type="radio" name="search" value="google" />
					<img id="googleimg" alt="Google" src="<?php echo $imagespath; ?>search/googleb.png" />
				</div>
				<div>
					<input type="radio" name="search" value="youtube" />
					<img alt="Youtube" src="<?php echo $imagespath; ?>search/youtubeb.png" />
				</div>
				<div>
					<input type="radio" name="search" value="wikipedia" />
					<img id="wikipediaimg" alt="Wikipedia" src="<?php echo $imagespath; ?>search/wikipediab.png" />
				</div>
			</div>
			
			<div id="searchsubmit">
				<input id="searchterm" name="searchterm" type="text" placeholder="Search the web" />
				<input id="searchbutton" type="submit"  value="Search" />
				
			</div>
		</form>
</div>