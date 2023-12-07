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
	if (!$result)
	{
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

	$stmt = mysqli_prepare($connection, "
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
		WHERE m.ID = ?
		GROUP BY m.ID;
	");
	mysqli_stmt_bind_param($stmt, "i", $ID);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
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
function getMoviesByGenre($selectedGenre): array
{
	$connection = getDbConnection();

	$stmt = mysqli_prepare($connection,"
	SELECT movie.ID,
	       movie.TITLE,
	       movie.ORIGINAL_TITLE,
	       movie.DESCRIPTION,
	       movie.DURATION,
	       movie.RELEASE_DATE,
	       GROUP_CONCAT(genre.name) AS GENRES
	FROM movie
	    JOIN movie_genre mg ON movie.id = mg.movie_id
	    JOIN genre ON mg.genre_id = genre.id
	WHERE genre.name = ?
	GROUP BY movie.ID");
	mysqli_stmt_bind_param($stmt, "s", $selectedGenre);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$movies = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$movies[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'originalTitle' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'releaseDate' => $row['RELEASE_DATE'],
			'genres' => $row['GENRES']
		];
	}

	return $movies;
}