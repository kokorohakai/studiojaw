<?php
	class BuildForm{
		private $options;

		public function build(){
			?>
			<!-- Your markup goes here.-->
			<?php
		}

		public function __construct($options){
			$this->options = $options;
			$this->build();
		}
	}