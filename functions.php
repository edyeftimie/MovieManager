<?php
  function runtime_calculator($run) {
    $h = intval($run/60);
    if ($h == 1)
      $return_value = $h." hour ";
    else
      $return_value = $h." hours ";
    $min = $run%60;
    if ($min == 1)
      $return_value = $return_value."and ".$min." minute";
    else
      $return_value = $return_value."and ".$min." minutes";
    return $return_value;
  }
  function longest_movie($movies) {
    if (!isset($_COOKIE['longest-movie-length'])) {
      $movies_runtime = array_column($movies, "runtime");
      $max_runtime = max($movies_runtime);
      setcookie("longest-movie-length", $max_runtime);
      return $max_runtime;
    }else {
      $max_runtime = $_COOKIE['longest-movie-length'];
      return $max_runtime;
    }
  }
  function comparatorFunc( $x, $y) {
        if ($x->year== $y->year)
            return 0;
        if ($x->year < $y->year)
            return -1;
        else
            return 1;
  }
  function ratingSystem($id, $rating) {
    $rating_db = json_decode(file_get_contents('movies_rating.txt'));
    $rating_db[$id - 1][$rating - 1]++;
    return $rating_db;
  }
  function create_db ($movies) {
    $file = fopen('movies_rating.txt', 'w');
    $rating_db = array();
    for ($id = 0; $id < sizeof($movies); $id++) {
      $rating_db[$id] = array(
  		  0 => 0,
  		  1 => 0,
  		  2 => 0,
  		  3 => 0,
  		  4 => 0
		  );
    }
    fwrite($file, json_encode($rating_db));
    fclose($file);
		return $rating_db;
	}
	function get_rating ($id) {
    $rating_db = json_decode(file_get_contents('movies_rating.txt'));
    $rating = 0;
    $people = 0;
    for ($i = 0; $i < 5; $i++) {
      $rating += $rating_db[$id - 0][$i - 0] * $i;
      $people += $rating_db[$id - 0][$i - 0];
    }
    if ($people)
      $rating /= $people;
    return $rating;
	} ?>
