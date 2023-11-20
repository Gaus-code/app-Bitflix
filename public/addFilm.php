<?php
require_once __DIR__ . '/../boot.php';
/**
 * @var array $genres;
 * @var array $movies
 */


echo renderTemplate('layout', [
	'title' => getConfigValue('TITLE', 'Bitflix :: addFilm'),
	'page' => renderTemplate('/pages/addFilm', []),
]);
