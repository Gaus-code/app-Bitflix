<?php
require_once __DIR__ . '/../data/movies-data.php';
require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres ;
 * @var array $movies ;
 * @var array $genre ;
 */
function getMovie(array $movies): array
{
	foreach ($movies as $movie)
	{
		return $movie;
	}
	/** @var array $movie */
	return $movie;
}

$selectedGenre = $_GET['genre'] ?? '';
if (!empty($_GET['genre']))
{
	echo renderTemplate('layout', [
		'title' => getConfigValue('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $selectedGenre,
			'movie' => getMovie($movies),
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