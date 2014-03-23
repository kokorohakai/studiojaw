<?php
class Upload{
	private $file = array();
	private $id = 0;

	private function moveFile(){
		move_uploaded_file( $this->file["temp"], $this->file['location'] );
	}

	private function updateDB(){
		global $db,$e;

		$fname = $db->sanitize($this->file['name']);
		$data = $db->query('SELECT * FROM "dj_albums" WHERE "id" = '.$this->id);
		if (count($data) > 0){
			if (!empty($data[0]['cover'])){
				unlink("dj/img/covers/".$data[0]['cover']);
			}
			/*
				Sometime in the future, I should request the current cover and unlink it before updating.
			*/
			$db->query('UPDATE "dj_albums" SET "cover" = \''.$fname.'\' WHERE "id" = '.$this->id);
			
			$e[] = "Successfully changed the cover!";
		} else {
			$e[] = "Invalid Album Specified!";
		}
	}

	public function __construct(){
		global $e; //messages returned.
		$this->id = intval($_REQUEST['id']);

		$this->file = array(
			"name"=>$this->id."_".$_FILES['uploadfile']['name'],
			"temp"=>$_FILES['uploadfile']['tmp_name'],
			"location"=>"dj/img/covers/".$this->id."_".$_FILES['uploadfile']['name']
		);

		if (!empty($this->file['name'])) {
			$this->moveFile();
			if (file_exists($this->file['location'])){
				$this->updateDB();
			} else {
				$e[] = "Failed to upload new file!";
			}
		} else {
			$e[] = "Upload failed: No file specified.";
		}
	}
}