<?php
$e = array();
if (file_exists("class/formFinish/".$_REQUEST['t'].".php")){
	require("class/formFinish/".$_REQUEST['t'].".php");
	$form = new FormFinish();
} else if (file_exists("class/formFinish/upload/".$_REQUEST['u'].".php")) {
	require("class/formFinish/upload/".$_REQUEST['u'].".php");
	$upload = new Upload();
	?>
	<doctype HTML>
	<html>
		<head>
			<script type="text/javascript" language="javascript">
				var e = <?=json_encode($e);?>;
				var msg = "";
				for( var i in e){
					msg+=e[i]+"\n";
				}
				if (msg){
					parent.alert(msg);
				}
				parent.uploadApp.stopUpload('<?=uniqid("");?>');
				window.location = "/blank.html";
			</script>
		</head>
	</html>
	<?php
	//we don't want to send the ajax data in the main ajax.php head.
	apc_clear_cache();
}
die(0);
?>