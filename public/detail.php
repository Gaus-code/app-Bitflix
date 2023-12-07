<?php
require_once __DIR__ . '/../boot.php';
/**
 * @throws Exception
 */
$ID = $_GET['ID'] ?? '';

echo renderTemplate('layout',[
	'title' => option('TITLE', 'Bitflix :: About'),
	'page' => renderTemplate('pages/detail', [
		'dbMovies' => getMovieById($ID),
	]),
]);

