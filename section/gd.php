<?
if( file_exists("gd/".$_SESSION['subsection'].".php") && strlen($_SESSION['subsection']) > 0 )
{
	require("gd/".$_SESSION['subsection'].".php");
	?>
	<br><br><a href="?subsection=none">Return to browsing</a>
	<?
}
else
{
	?>
	<h1>Graphic Design Portfolio</h1><br><br>
	<table>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece01"><img src="gd/piece01-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece02"><img src="gd/piece02-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece03"><img src="gd/piece03-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece04"><img src="gd/piece04-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece05"><img src="gd/piece05-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece06"><img src="gd/piece06-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece07"><img src="gd/piece07-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece08"><img src="gd/piece08-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece09"><img src="gd/piece09-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece10"><img src="gd/piece10-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
			<td>
			</td>
			<td>
				<?
				$pf = new pictureframe();
				$pf -> top(); 
				?>
				<a href="?subsection=piece11"><img src="gd/piece11-tn.png"></a>
				<?
				$pf -> bottom();
				?>
			</td>
		</tr>
	</table>
	<?
}
?>