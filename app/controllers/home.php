<?php

class home extends BaseController {

	function index() {
		View::render("home/index", [
			"name" => "Buddy"
		]);
	}

	function foo() {
		echo "home foo";
	}
}