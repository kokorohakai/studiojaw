Every week I've been going to Papa Pete's to their "Open Table Night", to practice and build / tryout new setlists. Here is a list of the rehersals for those shows, and others.
Generally my rule for Papa Pete's is that if a song has lyrics, they must be in English, that they follow the bpm of the set. A newer rule is that it needs to be slow enough
for dancers there to dance to. Apparently they don't like it too much when I play things 170 or over. Sometimes I break those rules, I'm bad at sticking to them. But that's
because there is a lot of stuff I want to expose people to, and I am willing to flex around the rules to do it.<br>
<br>
The shows are ordered from newest to oldest, please have a look around and if you like something, don't be afraid to share the link!<br>
<br>
<h2>Shows</h2>
<?
$sf = new simpleframe();
$sf -> top(); 
?>
<table class="list">
	<tr class="head">
		<td class="head">
			Name
		</td>
		<td class="head">
			Comment
		</td>
		<td class="head">
			Date
		</td>
	</tr>
	<?php
	$files = scandir("dj/mixes/");
	$type="even";
	$info = $db->query('SELECT * FROM "dj_albums" ORDER BY "date" DESC');
	foreach ( $info as $file=>$data )
	{
		?>
		<tr class="<?=$type;?>">
			<td>
				<a href="?section=dj&subsection=ps&id=<?=$data["id"];?>">
					<?=( empty( $data["title"] ) ) ? $data["file"] : $data["title"]; ?>
				</a>
			</td>
			<td>
				<?=( empty( $data["comment"] ) ) ? "" : $data["comment"]; ?>
			</td>
			<td>
				<?=( empty( $data["date"] ) ) ? "Uploaded on ".date("j/n/Y",filemtime("dj/mixes/".$data["file"])) : $data["date"]; ?>
			</td>
		</tr>
		<?php
		$type=($type=="even")?"odd":"even";
	}
	?>
</table>
<?
$sf -> bottom();
?>
<?php 
/*
<h2>Video with Audio Shows</h2>
<?
$sf = new simpleframe();
$sf -> top(); 
?>
<table class="list">
	<tr class="head">
		<td class="head">
			Name
		</td>
		<td class="head">
			Comment
		</td>
		<td class="head">
			Date
		</td>
	</tr>
	<?php
	$files = scandir("dj/mixes/");
	$type="even";
	foreach ( $info as $file => $data )
	{
		if ( strtolower(substr($file,-3,3)) == "mp4" )
		{
			?>
			<tr class="<?=$type;?>">
				<td>
					<a href="?section=dj&subsection=ps&file=<?=$file?>">
						<?=( empty($info[$file] ) && empty( $info[$file]["title"] ) ) ? $file : $info[$file]["title"]; ?>
					</a>
				</td>
				<td>
					<?=( empty($info[$file] ) && empty( $info[$file]["comment"] ) ) ? "" : $info[$file]["comment"]; ?>
				</td>
				<td>
					<?=( empty($info[$file] ) && empty( $info[$file]["date"] ) ) ? "Uploaded on ".date("j/n/Y",filemtime("dj/mixes/".$file)) : $info[$file]["date"]; ?>
				</td>
			</tr>
			<?php
			$type=($type=="even")?"odd":"even";
		}
	}
	?>
</table>
<?php
$sf -> bottom();
*/
?>
<br><br>
<div style="text-align:center;font-size:8px;font-family:'Arial',sans-serif;">
Last updated: 3/21/2013
</div>
