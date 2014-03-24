<?php
class FormFinish{
	private function updateDB(){
		global $db;
		if ( empty($_GET['table']) ){ 
			renderFailure();
		}
		
		$columnInfo = $db->query('SELECT * FROM "information_schema"."columns" WHERE table_name = \''.$_GET['table'].'\'');

		$c = array();
		foreach($columnInfo as $column){
			$c[$column['column_name']] = $column;
		}
		unset($columnInfo);

		$qc = count($_POST["id"]);
		$errors = false;
		$table = $db->sanitize($_GET['table']);
		for ($i=0;$i<$qc;$i++){
			$sql = 'UPDATE "'.$table.'" SET ';
			foreach($_POST as $column=>$data){
				$column = $db->sanitize($column);
				$data = $db->sanitize($data[$i]);
				if ($column!="id"){
					$sql.='"'.$column.'" = ';
					switch($c[$column]['data_type']){
						case "integer":
							if(empty($data)) $data = "NULL";
							$sql.=$data.", ";
						break;
						case "double precision":
							if(empty($data)) $data = "NULL";
							$sql.=$data.", ";
						break;
						case "text":
							$sql.='\''.$data.'\', ';
						break;
					}
				}
			}
			$sql = substr($sql,0,-2);
			$sql.=' WHERE "id" = '.intval($_POST['id'][$i]);
			if ( $db->query($sql)!==false && !$errors){
				$errors = false;
			} else {
				$errors = true;
			}
		}


		var_dump($_GET);
		echo "<br><br>";
		var_dump($_POST);

		if (!$errors){
			$this->renderSuccess();
		} else {
			$this->renderFailure();
		}
		var_dump($_GET);
		echo "<br><br>";
		var_dump($_POST);
	}

	public function renderSuccess(){
		?>
		<script type="text/javascript" language="javascript">
			parent.alert("Successfully Saved Table Data");
			parent.location.reload();
			window.location = "/blank.html";
		</script>
		<?php
	}

	public function renderFailure(){
		?>
		<script type="text/javascript" language="javascript">
			parent.alert("Failed to Update Table Data");
			window.location = "/blank.html";
		</script>
		<?php
	}

	public function __construct(){
		$this->updateDB();
	}
}