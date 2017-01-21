<?php

class Movie extends BaseModel {
	
	private $_title = "";
	private $_synopsis = "";
	private $_director = "";
	private $_stars = "";

	static function getMovies() {
		// Start the DB connection
		$DB = new Database();
		$movies = $DB->connection()->get('films');
		
		$result = [];
		foreach ($movies as $movieArr) {
			$movie = new Movie();
			$movie->_title = $movieArr['title'];
			$movie->_synopsis = $movieArr['synopsis'];
			$movie->_director = $movieArr['director'];
			$movie->_stars = $movieArr['stars'];
			$result[] = $movie;
		}
		return $result;
	}
}