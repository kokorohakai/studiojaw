<?php
if ( !empty($_REQUEST['id']) && !empty($_REQUEST['table']) ){
	$table = $db->sanitize($_REQUEST['table']);
	$id = intval($_REQUEST['id']);
	$sql = 'DELETE FROM "'.$table.'" WHERE "id" = '.$id;
	@$db->query($sql);
	$output["success"]=true;
} else {
	$output["error"] = "I need an ID and table to delete from.";
}
