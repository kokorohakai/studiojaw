<?php
	class BuildForm{
		private $options;

		public function build(){
			global $db;
			$columnInfo = $db->query('SELECT * FROM "information_schema"."columns" WHERE table_name = \'dj_albums\'');
			?>
			<link rel="stylesheet" type="text/css" href="/css/form/table.css">

			<h2><?=$this->options['caption'];?></h2>
			<form action="/ajax.php?a=form&t=table&id=<?=$this->options['id'];?>&table=<?=$this->options['table']?>" method="post" enctype="multipart/form-data" id="table_form" target="hiddenFrame">
			<table>
				<?php
				$type = "odd";
				foreach ($columnInfo as $column) {
					if ($column['column_name']!=$this->options['pkey']){
						?>
						<tr class="<?=$type;?>">
							<td>
								<?=$column['column_name'];?>
							</td>
							<td>
								<?php
								switch($column['data_type']){
									//fill in as you discover / use them.
									case 'text':
										?>
										<textarea name="<?=$column['column_name'];?>" class="table_formData"><?=$this->options['defaultData'][$column['column_name']];?></textarea>
										<?php
									break;
									case 'integer':
										?>
										<input name="<?=$column['column_name'];?>" class="table_formData" constraint="integer" value="<?=$this->options['defaultData'][$column['column_name']];?>">
										<?php
									break;
									case 'double precision':
										?>
										<input name="<?=$column['column_name'];?>" class="table_formData" constraint="float" value="<?=$this->options['defaultData'][$column['column_name']];?>">
										<?php
									break;
									default:
										echo $column['data_type'];
									break;
								}
								//var_dump($column); 
								?>
							</td>
						</tr>
						<?php
						if ($type == "odd"){
							$type = "even";
						} else {
							$type = "odd";
						}
					}	
				}
				?>
				<tr>
					<td>
					</td>
					<td>
						<input type="submit" value="<?=$this->options['submitCaption'];?>" id="table_formSubmit">
					</td>
				</tr>
			</table>
			<iframe name="hiddenFrame" id="hiddenFrame" src="/blank.html" style="display:none;"></iframe>
			<?
		}

		public function __construct($options){
			$this->options = $options;
			$this->build();
		}
	}