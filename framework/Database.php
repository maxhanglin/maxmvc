<?php

class Database {

	function __construct() {

		$host = $GLOBALS['config']['database']['host'];
		$username = $GLOBALS['config']['database']['username'];
		$password = $GLOBALS['config']['database']['password'];
		$dbname = $GLOBALS['config']['database']['dbname'];
		new MysqliDb ($host, $username, $password, $dbname);
	}

	function connection() {
		return MysqliDb::getInstance();
	}
}