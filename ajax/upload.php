<?php
$e = array();
if (file_exists("class/upload/".$_REQUEST['t'].".php")){
	require("class/upload/".$_REQUEST['t'].".php");
	$upload = new Upload();
}
?>
<doctype HTML>
<html>
	<head>
		<script type="text/javascript" language="javascript">
			parent.uploadApp.stopUpload('<?=uniqid("");?>');
			var e = <?=json_encode($e);?>;
			var msg = "";
			for( var i in e){
				msg+=e[i]+"\n";
			}
			if (msg){
				parent.alert(msg);
			}
		</script>
	</head>
</html>
<?php
//we don't want to send the ajax data in the main ajax.php head.
apc_clear_cache();
die(0);
?>