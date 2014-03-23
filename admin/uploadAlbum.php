<?php
	require_once("class/form.php");
?>
<script type="text/javascript" language="javascript" src="/admin/uploadAlbum.js"></script>
<h1>Upload Album / Show</h1><br><br>
<?php
$pf = new pictureframe();
$pf -> top(); 
new Form(
	array(
		"type"=>"upload",
		"uploadType"=>"album"
	)
);

$pf -> bottom();
?>
