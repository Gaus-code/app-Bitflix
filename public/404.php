<?php
require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres;
 * @var array $movies
 */


echo renderTemplate('layout', [
	'title' => 'NOT FOUND',
	'page' => renderTemplate('/pages/404', []),
]);
