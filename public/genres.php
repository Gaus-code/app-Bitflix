<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../data/movies-data.php';
/**
 * @var array $genres;
 * @var array $movies;
 */
global $movies;
$genre = $_GET['genre'];

foreach ($movies as $movie)
{
	$filteredMovies = array_filter($movies, function ($genre) use ($movie)
	{
		$genres = $movie['genres'];
		return implode($genres) == $genre;
	});
}

echo renderTemplate('layout',[
	'title' => getConfigValue('TITLE', 'Bitflix :: Genres'),
	'page' => renderTemplate('pages/genres', [
		'genre' => $genre,
	]),
]);