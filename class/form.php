<?php
/*
	options
		type: 
			see form folder for supported types.
		uploadType:
			see formFinish/upload folder for supported types.
		table:
*/
class Form{
	private $options = array();
	
	private function buildForm(){
		if (isset($this->options['type'])){
			$type = "class/form/".$this->options['type'].".php";
			if (file_exists($type)){
				require($type);
				$formbody = new BuildForm($this->options);
			}
		}
	}

	public function __construct( $options ){
		$this->options = $options;
		$this->buildForm();
	}	
}