<?php
	apc_clear_cache();
	$id = uniqid("");
?>
<script type="text/javascript" language="javascript" src="/admin/upload.js"></script>
<link rel="stylesheet" type="text/css" href="/admin/upload.css">
<h1>Upload Album / Show</h1><br><br>
<?php
$pf = new pictureframe();
$pf -> top(); 
?>
	<form action="/ajax.php?a=upload&t=album" target="hiddenFrame" method="post" enctype="multipart/form-data" id="upload_form">
		<input type="hidden" name="APC_UPLOAD_PROGRESS" id="upload_id" value="<?=$id;?>">
		<table>
			<tr>
				<td>
					Album / Show:
				</td>
				<td>
					<input type="file" name="uploadfile" id="upload_file">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<button id="upload_button">Begin Upload</button>
				</td>
			</tr>
		</table>
	</form>
	<br>
	<div id="statusBar" style="display:none"><div id="statusBarProgress"></div><div id="statusBarText">0%</div></div>
<?php
$pf -> bottom();
?>
<iframe name="hiddenFrame" src="/blank.html" id="hiddenFrame" style="display:none"></iframe><br>

