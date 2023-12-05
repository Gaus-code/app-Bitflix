<?php
require_once __DIR__ . '/../boot.php';

echo renderTemplate('/pages/404', [
	'title' => 'NOT FOUND',
	'page' => renderTemplate('pages/404', []),
]);
