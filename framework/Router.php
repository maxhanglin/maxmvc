<?php

class Router {

	private $routes;

	function __construct($inputURL) {
		$this->routes = $GLOBALS["config"]["routes"];
		$route = $this->findRoute($inputURL);

		if (class_exists($route["controller"])) {
			$controller = new $route["controller"]();
			if (method_exists($controller, $route["action"])) {
				if (isset($route["value"]) && $route["value"] != null) {
					$controller->$route["action"]($route["value"]);
				} else {
					$controller->$route["action"]();
				}
			} else {
				Error::show(404);
			}
		} else {
			Error::show(404);
		}
	}

	static function getCurrentController($inputURL = null) {
		
		if (is_null($inputURL)) {
			parse_str($_SERVER["QUERY_STRING"], $qsOutput);
			if (!isset($qsOutput["url"])) {
				$qsOutput["url"] = "";
			}
			$inputURL = $qsOutput["url"];
		}

		$uri_1 = Router::getUriPart($inputURL, 0);

		if ($uri_1 == "") {
			$uri_1 = $GLOBALS["config"]["defaults"]["controller"];
		}

		return $uri_1;
	}

	static function getCurrentAction($inputURL = null) {

		if (is_null($inputURL)) {
			parse_str($_SERVER["QUERY_STRING"], $qsOutput);
			if (!isset($qsOutput["url"])) {
				$qsOutput["url"] = "";
			}
			$inputURL = $qsOutput["url"];
		}

		$uri_2 = Router::getUriPart($inputURL, 1);
		
		if ($uri_2 == "") {
			$uri_2 = $GLOBALS["config"]["defaults"]["action"];
		}
		
		return $uri_2;
	}

	static function getCurrentValue($inputURL = null) {

		if (is_null($inputURL)) {
			parse_str($_SERVER["QUERY_STRING"], $qsOutput);
			if (!isset($qsOutput["url"])) {
				$qsOutput["url"] = "";
			}
			$inputURL = $qsOutput["url"];
		}

		$uri_3 = Router::getUriPart($inputURL, 2);
		
		if ($uri_3 == "") {
			$uri_3 = null;
		}
		
		return $uri_3;
	}

	static function redirect($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
	}

	static function isGET() {
		return ($_SERVER['REQUEST_METHOD'] === "GET");
	}

	static function isPOST() {
		return ($_SERVER['REQUEST_METHOD'] === "POST");
	}

	static function isPUT() {
		return ($_SERVER['REQUEST_METHOD'] === "PUT");
	}

	static function isDELETE() {
		return ($_SERVER['REQUEST_METHOD'] === "DELETE");
	}

	private function getRouteParts($route) {
		if (is_array($route)) {
			$route = $route["url"];
		}
		$parts = explode("/", $route);
		return $parts;
	}

	static function getUriPart($url, $part) {
		$parts = explode("/", $url);
		return (isset($parts[$part])) ? $parts[$part] : "";
	}

	/**
	 * Gets an URL input string and converts it to a controller:action pair of values.
	 * @param  string $inputURL
	 * @return Array $route
	 */
	private function findRoute($inputURL) {

		// loop through all the routes specified in the configuration
		foreach ($this->routes as $route) {

			// obtain the route "parts"
			$parts = $this->getRouteParts($route);
			$allMatch = true;

			// check if the input URL matches the route
			foreach ($parts as $index => $part) {
				if (strlen($part) > 0 && $part[0] == ":") {
					$route["value"] = self::getCurrentValue($inputURL);
				} else if ($part != "*") {
					if (Router::getUriPart($inputURL, $index) != $part) {
						$allMatch = false;
					}
				}
			}
			if ($allMatch) {
				// if all the parts match, end the search and return the route
				return $route;
			}
		}

		// if we don't have a match between the defined routes
		// we either return the default controller-action pair
		// or the default action for the specified controller
		$route = array(
			"controller" => self::getCurrentController($inputURL),
			"action" => self::getCurrentAction($inputURL),
			"value" => self::getCurrentValue($inputURL)
		);
		return $route;
	}
}