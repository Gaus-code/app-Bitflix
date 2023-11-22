<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../data/movies-data.php';
/**
 * @var array $genres;
 * @var array $movies;
 */

$genre = $_GET['genre'] ?? '';
if(($_GET['genre'] ?? '') ?? (empty($_GET['genre'])))
{
	$genre = isset($_GET['genre']) ? (string)$_GET['genre'] : $_GET['genre'];
}

if (!$_REQUEST || !$genre)
{
	echo renderTemplate('layout', [
		'title' => 'NOT FOUND',
		'page' => renderTemplate('/pages/404', []),
	]);
	exit;
}

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