<?php
	class BuildForm{
		private $options;

		public function build(){
			global $db;
			$data = $this->options['defaultData'];
			
			$columnInfo = $db->query('SELECT * FROM "information_schema"."columns" WHERE table_name = \'dj_tracks\'');
			?>
			<link rel="stylesheet" type="text/css" href="/css/form/foreignTable.css">
			<script type="text/javascript" language="javascript" src="script/toolbox.js"></script>
			<script type="text/javascript" language="javascript" src="script/form/foreignTable.js"></script>
			<script type="text/javascript" language="javascript">
				ForeignTable.data = <?=json_encode($this->options);?>;
			</script>
			<div style="position:relative">
				<h2><?=$this->options['caption'];?></h2>
				<div id="foreignTable_toolbar">
					<div id="foreignTable_status" style="color:green">Unchanged</div>&nbsp;|
					<div id="foreignTable_toolbox">
						<div class="toolbox">
							<div>
								<a href="javascript:foreignTableApp.addRow(<?=$x?>);">Add Row</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form action="/ajax.php?a=form&t=foreignTable&table=<?=$this->options['table']?>" method="post" enctype="multipart/form-data" id="foreignTable_form" target="hiddenFrame">
			<table class="foreignTable">
				<thead>
					<th></th>
					<? foreach ($columnInfo as $column){ 
						if ( $column['column_name']!=$this->options['pkey'] && $column['column_name']!=$this->options['fkey'] ) {
							echo "<th>".$column['column_name']."</th>";
						}
					} ?>
					<th>Action</th>
				</thead>
				<? 
				$type="odd";
				foreach($data as $x=>$row){ 
					?>
					<tr class="<?=$type;?>" id="foreignTalbeRow_ <?=$y;?>">
						<td><input type="hidden" name="id[]" value="<?=$row['id']?>"></td>
						<? foreach ($columnInfo as $y=>$column){ 
							if ( $column['column_name']!=$this->options['pkey'] && $column['column_name']!=$this->options['fkey'] ) { ?>
								<td>
									<?php
									switch($column['data_type']){
										//fill in as you discover / use them.
										case 'text':
											?>
											<textarea name="<?=$column['column_name'];?>[]" class="foreignTable_formData" id="<?=$x."_".$y;?>"><?=$row[$column['column_name']];?></textarea>
											<?php
										break;
										case 'integer':
											?>
											<input name="<?=$column['column_name'];?>[]" class="foreignTable_formData" constraint="integer" value="<?=$row[$column['column_name']];?>" id="<?=$x."_".$y;?>">
											<?php
										break;
										case 'double precision':
											?>
											<input name="<?=$column['column_name'];?>[]" class="foreignTable_formData" constraint="float" value="<?=$row[$column['column_name']];?>" id="<?=$x."_".$y;?>">
											<?php
										break;
										default:
											echo $column['data_type'];
										break;
									}
									//var_dump($column); 
									?>								
								</td>
							<? } ?>
						<? } ?>
						<td class="action">
							<div class="toolbox">
								<div>
									<a href="javascript:foreignTableApp.undo(<?=$x?>);">Undo Changes</a>
								</div>
								<div>
									<a href="javascript:foreignTableApp.deleteRow(<?=$row['id']?>);">Delete</a>
								</div>
							</div>
						</td>
					</tr>
					<? 
					if ($type == "odd"){
						$type = "even";
					} else {
						$type = "odd";
					}
				} ?>
				<tr>
					<td>
					</td>
					<td>
						<input type="submit" value="<?=$this->options['submitCaption'];?>" id="table_formSubmit">
					</td>
				</tr>
			</table>
			<iframe name="hiddenFrame" id="hiddenFrame" src="/blank.html" style="display:none"></iframe>
			<?php
		}

		public function __construct($options){
			$this->options = $options;
			$this->build();

		}
	}