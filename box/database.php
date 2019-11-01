<?php

class Database {

	public $connection;

	public function __construct() {
		$this->connect_to_db();
	}

	public function connect_to_db() {

		$this->connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
		mysqli_set_charset($this->connection, "utf-8");

		if (mysqli_connect_errno()) {
			die("Could not connect to database" . mysqli_connect_error());
		} else {

			//echo "You are connected to database";
		}
	}

	public function find_query($sql) {
		$result = mysqli_query($this->connection, $sql);

		return $result;
	}

	public function escape_string($string) {
		$escape_string = mysqli_real_escape_string($this->connection, $string);

		return $escape_string;
	}

}
$dbc = new Database();

?>