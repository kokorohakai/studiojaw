<?php
if ( !empty($_REQUEST['fid']) && !empty($_REQUEST['table']) && !empty($_REQUEST['fkey']) ){
	$table = $db->sanitize($_REQUEST['table']);
	$fkey = $db->sanitize($_REQUEST['fkey']);
	$fid = intval($_REQUEST['fid']);
	$sql = 'INSERT INTO "'.$table.'" ("'.$fkey.'") VALUES('.$fid.')';
	@$db->query($sql);
	$output["success"]=true;
} else {
	$output["error"] = "I need an ID, table, and foreign key column name to insert.";
}
