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
	$result = mysqli_query($connection, "SELECT * FROM movie");
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
			'directorID' => $row['DIRECTOR_ID'],
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
			'movies' => getMovies($dbMovies),
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