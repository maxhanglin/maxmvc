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
			$movie->id = $movieArr['id'];
			$movie->title = $movieArr['title'];
			$movie->synopsis = $movieArr['synopsis'];
			$movie->director = $movieArr['director'];
			$movie->stars = $movieArr['stars'];
			$result[] = $movie;
		}
		return $result;
	}

	function get() {
		// Start the DB connection
		$DB = new Database();
		$DB->connection()->where('id', $this->id);
		$result = $DB->connection()->get('films')[0];
		
		$this->id = $result['id'];
		$this->title = $result['title'];
		$this->synopsis = $result['synopsis'];
		$this->director = $result['director'];
		$this->stars = $result['stars'];
	}

	function save() {

		$data = [];
		$data['title'] = $this->title;
		$data['director'] = $this->director;
		$data['synopsis'] = $this->synopsis;
		$data['stars'] = $this->stars;

		if ($this->_id == 0) {

			// Insert			
			$DB = new Database();
			$id = $DB->connection()->insert('films', $data);
			
			if($id) {
			    return $id;
			}
			else {
				return false;
			}
		} else {

			// Update
			$DB = new Database();
			$DB->connection()->where('id', $this->id);
			if ($DB->connection()->update('films', $data)) {
				return true;
			} else {
				return false;
			}
		}
	}

	static function delete($id) {

		if (isset($id)) {
			$DB = new Database();
			$DB->connection()->where('id', $id);
			if ($DB->connection()->delete('films')) {
				return true;
			} else {
				return false;
			}
		}
	}
}