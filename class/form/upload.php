<?php
	class BuildForm{
		private $options;

		public function build(){
			apc_clear_cache();
			$id = uniqid("");
			$fileCaption = "File:";
			switch($this->options['uploadType']){
				case 'album':
					$fileCaption = "Album / Show:";
					break;
				case 'cover':
					$fileCaption = "Cover Image:";
					break;
			}
			$rid = "";
			if (isset($this->options["id"])){
				$rid = "&id=".$this->options["id"];
			}
			?>
			<script type="text/javascript" language="javascript" src="/script/form/upload.js"></script>
			<script type="text/javascript" language="javascript">
				UploadApp.data = <?=json_encode($this->options);?>;
			</script>
			<link rel="stylesheet" type="text/css" href="/css/form/upload.css">
			<form action="/ajax.php?a=form&u=<?=$this->options['uploadType'];?><?=$rid?>" target="hiddenFrame" method="post" enctype="multipart/form-data" id="upload_form">
				<input type="hidden" name="APC_UPLOAD_PROGRESS" id="upload_id" value="<?=$id;?>">
				<table>
					<tr>
						<td>
							<?=$fileCaption;?>
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
			<iframe name="hiddenFrame" src="/blank.html" id="hiddenFrame" style="display:none"></iframe>
			<?php
		}

		public function __construct($options){
			$this->options = $options;
			$this->build();
		}
	}