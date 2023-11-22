<?php
require_once __DIR__ . '/../data/movies-data.php';
require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres;
 * @var array $movies
 */
global $genre;

//проверяем наличие ключа
$genre = $_GET['genre'] ?? '';
if(isset($_GET['genre']) && !empty($_GET['genre']))
{
	echo renderTemplate('layout',[
		'title' => getConfigValue('TITLE', 'Bitflix :: Genres'),
		'page' => renderTemplate('/components/genres', [
			'genre' => $genre,
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