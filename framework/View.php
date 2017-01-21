<?php

class View {

	private static $content = "";
	
	/**
	 * Renders the view passed as parameter inside the default HTML layout.
	 * @param  string $view
	 * @param  array $vars
	 */
	static function render($view, $vars = array()) {

		// Check filename extension
		$extensionCheck = explode(".", $view);
		if (!isset($extensionCheck[1])) {
			$view .= ".php";
		}

		//require_once $GLOBALS["config"]["path"]["app"]."views/{$view}";
		self::$content = self::get_include_contents($GLOBALS["config"]["path"]["app"]."views/{$view}", $vars);
		require_once $GLOBALS["config"]["path"]["app"]."layouts/default.php";

	}

	// Taken from http://php.net/manual/en/function.include.php and updated for my needs.
	private static function get_include_contents($filename, $vars) {
		if (is_file($filename)) {
			ob_start();

			// Create variables from the vars array
			foreach ($vars as $key => $value) {
				$$key = $value;
			}
			include $filename;

			return ob_get_clean();
		}
		return false;
	}

	/**
	 * Returns the HTML content from the view.
	 * Helper method to be used inside the HTML layout.
	 * @return string
	 */
	static function getContent() {
		return self::$content;
	}
}