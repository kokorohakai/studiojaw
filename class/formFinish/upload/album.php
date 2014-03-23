<?php
class Upload{
	private $file = array();

	private function moveFile(){
		move_uploaded_file( $this->file["temp"], $this->file['location'] );
	}

	private function updateDB(){
		global $db,$e;

		$fname = $db->sanitize($this->file['name']);
		$data = $db->query('SELECT * FROM "dj_albums" WHERE "file" = \''.$fname.'\'');
		if ( count($data)==0 ){
			//only update the database if the file doesn't already exist.
			$db->query('INSERT INTO "dj_albums" ("title","file") VALUES (\''.$fname.'\',\''.$fname.'\')');
			$e[] = "File successfully added to database!";
		} else {
			$e[] = "File already existed in database, updating file and spectrogram.";
		}
	}

	private function processFile(){
		chdir("admin");
		shell_exec('nohup php update_mixes.php "'.$this->file['name'].'" > /dev/null & echo $!');
		chdir("..");
	}
	public function __construct(){
		global $e;

		$this->file = array(
			"name"=>$_FILES['uploadfile']['name'],
			"temp"=>$_FILES['uploadfile']['tmp_name'],
			"location"=>"dj/mixes/".$_FILES['uploadfile']['name']
		);

		if (!empty($this->file['name'])) {
			$this->moveFile();
			if (file_exists($this->file['location'])){
				$this->updateDB();
				$this->processFile();
			} else {
				$e[] = "Failed to upload new file!";
			}
		} else {
			$e[] = "Upload failed: No file specified.";
		}
	}
}