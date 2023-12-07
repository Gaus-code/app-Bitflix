<?php
require_once __DIR__ . '/../boot.php';
$connection = getDbConnection();
$selectedGenre = $_GET['genre'] ?? '';
if (!empty($selectedGenre))
{
	echo renderTemplate('layout', [
		'title' => option('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $selectedGenre,
			'connection' => $connection,
		]),
	]);
}
else
{
	echo renderTemplate('layout', [
		'title' => option('TITLE', 'BITFLIX24'),
		'page' => renderTemplate('/pages/main', [
			'movies' => getMovieList($connection),
			'connection' => $connection,
		]),
	]);
}