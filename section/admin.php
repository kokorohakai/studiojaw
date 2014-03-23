<?php
if ($user->loggedIn()&&$user->isAdmin()){
	?>
	<?php
	if (file_exists("admin/".$_SESSION['subsection'].".php")){
		require("admin/".$_SESSION['subsection'].".php");
		?>
		<a href="?section=admin&subsection=home">Return to Administrator Portal</a>
		<?php
	} else {
		$albums = $db->query('SELECT * FROM "dj_albums" ORDER BY "date" DESC');
		?>
		<script type="text/javascript" language="javascript" src="script/toolbox.js"></script>
		<h1>Administrator Portal</h1><br><br>
		<?php
		$pf = new pictureframe();
		$pf -> top(); 
		?>
			You can do the following:<br>
			<a href="?section=admin&subsection=uploadAlbum">Upload new album/show</a><br>
			<br>
			<b>Edit Album Data:</b><br>
			<table>
			<?php
				foreach($albums as $album){
					?>
					<tr>
						<td>
							<?=$album['title'];?>
						</td>
						<td>
							<div class="toolbox">
								<div>
									<a href="?section=admin&subsection=editCover&id=<?=$album['id'];?>">Edit Album Cover</a>
								</div>
								<div>
									<a href="?section=admin&subsection=editAlbum&id=<?=$album['id'];?>">Edit Album Meta Data</a>
								</div>
								<div>
									<a href="?section=admin&subsection=editTracks&id=<?=$album['id'];?>">Edit Track Info</a>
								</div>
							</div>
						</td>
					</tr>
					<?php
				}
			?>
			</table>
		<?
		$pf -> bottom();
	}
	?>	
	<?php
} elseif($user->loggedIn()){
	?>
	You do not have Admistrative permissions.
	<?php
} else {
	?>
	You are not logged in...<br>
	<script type="text/javascript" language="javascript">
		window.location = "?section=login";
	</script>
	<?
}
?>