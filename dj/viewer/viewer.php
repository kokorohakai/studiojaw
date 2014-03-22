<?php
$id=intval($_GET['id']);
$album = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$id);
$file = $album[0]["file"];
$info[$file] = $album[0];
$tracks = $db->query('SELECT * FROM "dj_tracks" WHERE "dj_albums_id" = '.$id.' ORDER BY "position" ASC');
foreach($tracks as $marker){
	$info[$file]["markers"][$marker["position"]] = $marker;
}
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
/* 
	Some time in the future, I would like the viewer to be able to handle multiple file types, but for now, mp3 has been the only working type.
*/
require("mp3.php");
?>