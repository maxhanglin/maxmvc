<?php

class home extends BaseController {

	function index() {
		Load::view("home/index", [
			"name" => "Buddy"
		]);
	}

	function foo() {
		echo "home foo";
	}
}