<?php
$file=$_GET['file'];
$type=substr($file,-3,3);
?>
<script type="text/javascript" src="/dj/viewer/viewer.js"></script>
<script type="text/javascript" src="/dj/game/game.js"></script>
<script type="text/javascript" src="/dj/game/screen.js"></script>
<script type="text/javascript" src="/dj/game/optionscreen.js"></script>
<script type="text/javascript" src="/dj/game/titlescreen.js"></script>
<script type="text/javascript" src="/dj/game/gamescreen.js"></script>
<script type="text/javascript">
var trackInfo = <?=json_encode($info[$file],JSON_FORCE_OBJECT);?>;
</script>
<style type="text/css">
	<?php
	require("dj/viewer/viewer.css");
	echo "\n";
	require("dj/game/game.css");
	echo "\n";
	require("dj/game/optionscreen.css");
	echo "\n";
	require("dj/game/titlescreen.css");
	echo "\n";
	require("dj/game/gamescreen.css");
	echo "\n";
	?>
</style>
<?php
if ($type=="mp3")
{
	require("mp3.php");
} else {
	require("mp4.php"); 	 	
}
?>