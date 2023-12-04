<?php

require_once __DIR__ . '/../boot.php';
/**
 * @throws Exception
 * @var array $dbMovies ;
 * @var array $genre ;
 * @var array $genres ;
 */
function getMovies() :array
{
	$connection = getDbConnection();
	$result = mysqli_query($connection, "
		SELECT movie.ID, movie.title, movie.ORIGINAL_TITLE, movie.DESCRIPTION, movie.DURATION, movie.RELEASE_DATE, GROUP_CONCAT(genre.name) AS genres
		FROM movie
		JOIN movie_genre ON movie.id = movie_genre.movie_id
		JOIN genre ON movie_genre.genre_id = genre.id
		GROUP BY movie.ID;
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
			'title' => $row['title'],
			'original-title' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'ageRestriction' => $row['AGE_RESTRICTION'],
			'release-date' => $row['RELEASE_DATE'],
			'rating' => $row['RATING'],
			'genres' => $row['genres'],
		];
	}
	return $dbMovies;
}

function displayMovieList()
{
	$movies = getMovies();
	foreach ($movies as $movie)
	{
		generateMovieCard($movie);
	}
}



$selectedGenre = $_GET['genre'] ?? '';
if (!empty($_GET['genre']))
{
	echo renderTemplate('layout', [
		'title' => getConfigValue('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $selectedGenre,
			'movies' => $dbMovies,
		]),
	]);
}
else
{
	echo renderTemplate('layout', [
		'title' => getConfigValue('TITLE', 'BITFLIX24'),
		'page' => renderTemplate('/pages/main', []),
	]);
}