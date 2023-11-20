<?php

require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres;
 * @var array $movies
 */


echo renderTemplate('layout', [
	'title' => getConfigValue('TITLE', 'BITFLIX24'),
	'page' => renderTemplate('/pages/main', []),
]);
