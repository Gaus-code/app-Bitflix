<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../data/movies-data.php';

global $movies;

$ID = $_GET['ID'];

foreach ($movies as $movie)
{
	$filteredMovies = array_filter($movies, function ($ID) use ($movie)
	{
		return $movie['id'] == $ID;

	});
}

echo renderTemplate('layout',[
	'title' => getConfigValue('TITLE', 'Bitflix :: About'),
	'page' => renderTemplate('pages/detail', [
		'movie' => $movie,
	]),
]);