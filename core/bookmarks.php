<?php
	function bookmark ( $title , $name , $link , $imgp , $custom ) {
		echo "<li>
			<div class=\"bmimg\">
				<a href=\"$link\">";
				if ( $custom )
					echo "<img alt=\"$title\" src=\"$imgp/el/$name.png\" />";
				else
					echo "<img alt=\"$title\" src=\"$imgp/el/default.png\" />";
		echo "</a>
			</div>
			<div class=\"bmdescr\">
				<a href=\"$link\">
					$title
					<span class=\"bookmarkDescr\">$name</span>
				</a>
			</div>
		</li>";
	}
?>

<div id="bookmarks" class="elem">
	<h2>Bookmarks</h2>
		
		<h3>Uncategorized</h3>
		<ul class="bookmarks">
			<?php
				
				/**************
				UNCATEGORIZED
				**************/
				
				$bms = mysql_query("SELECT
													* 
												FROM
													`bookmarks` 
												WHERE 
													`group`=NULL");
			
				while (	$bm = mysql_fetch_array( $bms ) ) {
					$title = $bm["title"];
					$descr = $bm["descr"];
					$link = $bm["link"];

					bookmark( $title, $descr , $link , $imagespath , false );
				}
				bookmark( "IMDb" , "imdb" , "http://www.imdb.com" , $imagespath ,  true );
				bookmark( "Wallbase" , "wallb" , "http://www.wallbase.cc" , $imagespath , true );
				bookmark( "Facebook" , "fb" , "https://www.facebook.com" , $imagespath , true );
				bookmark( "9GAG" , "9gag" , "http://www.9gag.com" , $imagespath , true );
				bookmark( "Twitter" , "tw" , "https://www.twitter.com" , $imagespath , true );
				bookmark( "DeviantArt" , "da" , "http://www.deviantart.com" , $imagespath , true );
				bookmark( "Gmail" , "gmail" , "https://mail.google.com" , $imagespath , true );
				
			?>
			<li id="bmadd">
				<img alt="AddBookmark" src="<?php echo $imagespath ?>/actions/add.png" />
			</li>
		</ul>
	
	
		<?php		
			$g = mysql_query('SELECT * FROM bookmarksgroups');

			while (	$group = mysql_fetch_array( $g ) ) {
				echo "<h3>".$group['name']."</h3>";
		?>
		<ul class="bookmarks small">
			<?php
				
				/**************
				GET BOOKMARKS
				**************/
				
				$bms = mysql_query("SELECT
													* 
												FROM
													`bookmarks` 
												WHERE 
													`group`=".$group['id']);
			
				while (	$bm = mysql_fetch_array( $bms ) ) {
					$title = $bm["title"];
					$descr = $bm["descr"];
					$link = $bm["link"];

					bookmark( $title, $descr , $link , $imagespath , false );
				}

			?>
		</ul>
		<?php
			}
		?>
	<div class="actionsContainer">
		<div id="bookmarksActions" class="actions">
			<div class="actionObj">
				<div id="setSize" class="pseudolink" >
				</div>
			</div>	
			<div class="actionObj">
				<div id="AddBookmarksGroup" class="pseudolink" >
				</div>
			</div>
			<div class="actionObj">
				<div id="AddBookmark" class="pseudolink" >
				</div>
			</div>
			
		</div>
	</div>
	
	
	
	
	
	<!-- Elements for adding a new bookmark -->
			
			<div id="addbookmark">
				<form method="post" action="actions/bookmarks/add.php">
					<h3>Add a new bookmark</h3>
					<div>
						<label for="bmtitle">Title</label>
						<input type="text" id="bmtitle" name="bmtitle" />
					</div>
					<div>
						<label for="bmlink">Description</label>
						<input type="text" id="bmdescr" name="bmdescr" />
					</div>
					<div>
						<label for="bmlink"><strong>Link</strong></label>
						<input type="text" id="bmlink" name="bmlink" />
					</div>
					<div>
						<label for="bmgroup">Group</label>
						<select name="bmgroup">
							<option value="NULL">Uncategorized</option>
							<?php
								$getgr = mysql_query('SELECT * FROM bookmarksgroups');
								while (	$group = mysql_fetch_array( $getgr ) )
									echo "<option value=\"".$group['id']."\">".$group['name']."</option>";
							?>
						</select>
					</div>
					<div>
						<input type="submit"  value="Add" />
					</div>
				</form>
			</div>
			
			<div id="addbookmarksgroup">
				<form method="post" action="actions/bookmarks/addgroup.php">
					<h3>Add a new bookmarks group</h3>
					<div>
						<label for="groupname">Name</label>
						<input type="text" id="groupname" name="groupname" />
					</div>
					<div>
						<input type="submit"  value="Add" />
					</div>
				</form>
			</div>
	
	
	
	
</div>