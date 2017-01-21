<?php

class Router {

	private $routes;

	function __construct($inputURL) {
		$this->routes = $GLOBALS["config"]["routes"];
		$route = $this->findRoute($inputURL);

		if (class_exists($route["controller"])) {
			$controller = new $route["controller"]();
			if (method_exists($controller, $route["action"])) {
				$controller->$route["action"]();
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

	static function redirect($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);
	    exit();
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
				if ($part != "*") {
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
			"action" => self::getCurrentAction($inputURL)
		);
		return $route;
	}
}