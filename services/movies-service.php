<?php

function generateGenresList(): array
{
	$connection = getDbConnection();

	$result = mysqli_query($connection, "SELECT NAME, CODE FROM genre;");

	if (!$result) {
		throw new Exception(mysqli_error($connection));
	}
	$genres = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$genres[] = [
			'name' => $row['NAME'],
			'code' => $row['CODE']
		];
	}
	return $genres;
}
function getMovieList(): array
{
	$connection = getDbConnection();

	$result = mysqli_query($connection, "
		SELECT movie.ID, 
		movie.title,
		movie.ORIGINAL_TITLE,
		movie.DESCRIPTION,
		movie.DURATION,
		movie.RELEASE_DATE,
		GROUP_CONCAT(genre.name) AS GENRES
		FROM movie
		JOIN movie_genre ON movie.id = movie_genre.movie_id
		JOIN genre ON movie_genre.genre_id = genre.id
		GROUP BY movie.ID;
	");
	if (!$result) {
		throw new Exception(mysqli_error($connection));
	}

	$movies = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$movies[] = [
			'id' => $row['ID'],
			'title' => $row['title'],
			'originalTitle' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'releaseDate' => $row['RELEASE_DATE'],
			'genres' => $row['GENRES']
		];
	}
	return $movies;
}
function getMovieById($ID): array
{
	$connection = getDbConnection();

	$result = mysqli_query($connection, "
		SELECT m.ID, 
		m.TITLE,
		m.ORIGINAL_TITLE,
		m.RELEASE_DATE,
		m.DESCRIPTION,
		m.RATING,
		m.AGE_RESTRICTION,
		d.name AS DIRECTOR,
		GROUP_CONCAT(a.name) AS CAST
		FROM movie m
		JOIN movie_actor ma ON m.id = ma.movie_id
		JOIN actor a ON ma.actor_id = a.id
		JOIN director d ON m.director_id = d.id
		WHERE m.ID = '$ID'
		GROUP BY m.ID;
	");

	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$dbMovies = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$dbMovies[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'originalTitle' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'ageRestriction' => $row['AGE_RESTRICTION'],
			'releaseDate' => $row['RELEASE_DATE'],
			'rating' => $row['RATING'],
			'director' => $row['DIRECTOR'],
			'cast' => $row['CAST'],
		];
	}
	return $dbMovies;
}
function getMoviesByGenre($movies, $selectedGenre): array
{
	$selectedMovies = array();
	foreach ($movies as $movie)
	{
		$movieGenres = explode(',', $movie['genres']);
		foreach ($movieGenres as $neededGenre)
		{
			if ($neededGenre === $selectedGenre)
			{
				$selectedMovies[] = $movie;
			}
		}
	}
	return $selectedMovies;
}