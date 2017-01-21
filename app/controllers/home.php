<?php

class home extends BaseController {

	function index() {
		View::render("home/index", [
			"name" => "Buddy"
		]);

		// Start the DB connection
		// $DB = new Database();
		// $movies = $DB->connection()->get('films');
		// print_r($movies); die;
	}

	function foo() {
		echo "home foo";
	}
}