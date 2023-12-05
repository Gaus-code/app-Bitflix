<?php
require_once __DIR__ . '/../boot.php';

$selectedGenre = $_GET['genre'] ?? '';
if (!empty($_GET['genre']))
{
	echo renderTemplate('layout', [
		'title' => option('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $selectedGenre,
		]),
	]);
}
else
{
	echo renderTemplate('layout', [
		'title' => option('TITLE', 'BITFLIX24'),
		'page' => renderTemplate('/pages/main', [
			'movies' => getMovieList(),
		]),
	]);
}