<?php
require_once("class/form.php");

$fid = intval($_REQUEST['fid']);
$test = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$fid);
if (count($test)>0){
	$data = $db->query('SELECT * FROM "dj_tracks" WHERE "dj_albums_id" = '.$fid.' ORDER BY "position"');
	$pf = new pictureframe();
	$pf -> top(); 
	new Form(
		array(
			"type"=>"foreignTable",
			"table"=>"dj_tracks",
			"fid"=>$fid,
			"pkey"=>"id",
			"fkey"=>"dj_albums_id",
			"caption"=>"Edit Track Data.",
			"submitCaption" => "Save",
			//"completeScript"=>"editCoverApp.reloadPage();",
			"defaultData"=>$data
		)
	);
	$pf -> bottom();
} else {
	?>
	Album not found.<br><br>
	<?php
}
?>