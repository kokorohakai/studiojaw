<?php
if (!empty($_REQUEST['id'])){
	$output['status'] = apc_fetch("upload_".$_REQUEST['id']);
} else {
	$output['error'] = "No ID specified.";
}