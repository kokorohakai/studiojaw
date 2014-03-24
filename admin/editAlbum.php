<?php
require_once("class/form.php");

$id = intval($_REQUEST['id']);
$data = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$id);
if (count($data) > 0 ){
?>
	<?
	$pf = new pictureframe();
	$pf -> top(); 
	new Form(
		array(
			"type"=>"table",
			"table"=>"dj_albums",
			"id"=>$id,
			"pkey"=>"id",
			"caption"=>"Edit Album Meta Data.",
			"submitCaption" => "Save",
			//"completeScript"=>"editCoverApp.reloadPage();",
			"defaultData"=>$data[0]
		)
	);
	$pf -> bottom();
	?>

<?php
} else {
	?>
	Album not found.<br><br>
	<?php
}
?>