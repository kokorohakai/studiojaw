<?php
	require_once("credentials.php");
	class Database{
		private $credentials;
		private $dbconn;

		private function connect(){
			$this->dbconn = pg_connect(
				"host=".$this->credentials->host.
				" dbname=".$this->credentials->dbname.
				" user=".$this->credentials->user.
				" password=".$this->credentials->password
			);
			if (!$this->dbconn){
				die("Could not connect to database.");
			}
		}

		private function disconnect(){
			if ($this->dbconn){
				pg_close($this->dbconn);
			}
			unset($this->dbconn);
		}


		public function __construct(){
			$this->credentials = new Credentials();
			$this->connect();
		}

		public function __destruct(){
			$this->disconnect();
			unset($this->result);
			unset($this->credentials);
		}

		public function query($sql){
			$result = pg_query($sql);
			if (!$result){
				return $result;
			}

			$retval = Array();
			while ($line = @pg_fetch_array($result, null, PGSQL_ASSOC)) {
				$retval[]=$line;
			}
			return $retval;
		}

		public function lastId($table){
			$result = pg_query('SELECT MAX("id") FROM "'.$table.'"');
			$id = false;
			if ($line = @pg_fetch_array($result,null,PGSQL_ASSOC)){
				$id = intval($line['max']);
			}
			return $id;
		}

		public function sanitize($str){
			$out = stripslashes($str);
			$out = str_replace("'","''",$str);
			return $out;
		}
	}