<?
if ( file_exists( "t/php/".$_SESSION['example'].".php" ) )
{
	require( "t/php/".$_SESSION['example'].".php" );
	?>
	<br><br>
	<a href="?example=none">Return to list of <?=$_SESSION['subsection']?>examples.</a>
	<?
}
else
{
	?>
	<h1>PHP Code Examples</h1><br><br>
	<?
	$sf = new simpleframe();
	$sf -> top(); 
	?>
		<table class="list">
			<tr class="head">
				<td class="head">
					Variables
				</td>
			</tr>
			<tr class="odd">
				<td>
					<a href="?example=01">standard definition</a>
				</td>
			</tr>
		</table>
	<?
	$sf -> bottom();
	?>

	<?
}
?>