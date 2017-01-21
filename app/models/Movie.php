<?php

class Movie extends BaseModel {
	
	private $_id = 0;
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
			$movie->_id = $movieArr['id'];
			$movie->_title = $movieArr['title'];
			$movie->_synopsis = $movieArr['synopsis'];
			$movie->_director = $movieArr['director'];
			$movie->_stars = $movieArr['stars'];
			$result[] = $movie;
		}
		return $result;
	}

	function save() {

		if ($this->_id == 0) {

			// Insert
			$data = [];
			$data['title'] = $this->title;
			$data['director'] = $this->director;
			$data['synopsis'] = $this->synopsis;
			$data['stars'] = $this->stars;
			
			$DB = new Database();
			$id = $DB->connection()->insert('films', $data);
			
			if($id) {
			    return $id;
			}
			else {
				return false;
			}
		}
	}
}