<?php
$id = intval($_REQUEST['id']);
$data = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$id);
if (count($data) > 0){
	if (!empty($data[0]['cover'])){
		unlink("dj/img/covers/".$data[0]['cover']);
	}
	$db->query('UPDATE "dj_albums" SET "cover"=\'\' WHERE "id" = '.$id);
	$output['status'] = "success";
} else {
	$output['error'] = "No album specified.";
}