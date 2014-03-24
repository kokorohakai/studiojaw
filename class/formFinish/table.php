<?php
magic_quotes_runtime(false);
class FormFinish{
	private $file = array();

	private function updateDB(){
		global $db;
		//var_dump($_REQUEST);
		$columnInfo = $db->query('SELECT * FROM "information_schema"."columns" WHERE table_name = \''.$_GET['table'].'\'');
		
		$c = array();
		foreach($columnInfo as $column){
			$c[$column['column_name']] = $column;
		}
		unset($columnInfo);

		echo "<br>";
		$sql = 'UPDATE "'.$_GET['table'].'" SET ';
		foreach ($_POST as $column=>$data){
			$data = $db->sanitize($data);
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
		$sql = substr($sql,0,-2);
		$sql.=' WHERE "id" = '.intval($_GET['id']);
		if ( $db->query($sql)!==false){
			$this->renderSuccess();
		} else {
			$this->renderFailure();
		}
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