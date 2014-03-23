<?php
require_once("class/form.php");

$id = intval($_REQUEST['id']);
$data = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$id);
if (count($data) > 0 ){
?>
	<script type="text/javascript" language="javascript" src="/admin/editCover.js"></script>
	<script type="text/javascript" language="javascript">
		/*
			just a simple way to pack and ship data to the application.
		*/
		EditCoverApp.data = {
			id:<?=$id;?>
		}
	</script>
	<h1>Manage Album Cover</h1><br><br><br>
	<b>Current Cover:</b>
	<?php
	$pf = new pictureframe();
	$pf -> top(); 
	$cover="/dj/img/covers/nologo.png";
	if ( !empty($data[0]["cover"]) ){
		$cover="/dj/img/covers/".$data[0]["cover"];
	}
	?>
	<img src="<?=$cover; ?>" style="width:200px;height:200px">
	<?php
	$pf -> bottom();
	?>
	<br><br>
	<b>Change Cover:</b>
	<?
	$pf = new pictureframe();
	$pf -> top(); 
	new Form(
		array(
			"type"=>"upload",
			"uploadType"=>"cover",
			"id"=>$id,
			"completeScript"=>"editCoverApp.reloadPage();"
		)
	);
	?>
	<a href="javascript:editCoverApp.useDefault();">Use Default Cover</a>
	<?php
	$pf -> bottom();
} else {
	?>
	Album not found.<br><br>
	<?php
}
?>