<?php
require_once __DIR__ . '/../data/movies-data.php';
require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres ;
 * @var array $movies ;
 * @var array $genre ;
 * @var array $movie ;
 */

$selectedGenre = $_GET['genre'] ?? '';
if (!empty($_GET['genre']))
{
	echo renderTemplate('layout', [
		'title' => getConfigValue('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $selectedGenre,
		]),
		'movie' => $movie,
	]);
}
else
{
	echo renderTemplate('layout', [
		'title' => getConfigValue('TITLE', 'BITFLIX24'),
		'page' => renderTemplate('/pages/main', []),
	]);
}