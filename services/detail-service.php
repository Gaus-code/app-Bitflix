<?php

$ID = $_GET['ID'] ?? '';
if(($_GET['ID'] ?? ''))
{
	$ID = isset($_GET['ID']) ? (string)$_GET['ID'] : $_GET['ID'];
}

if (!$_REQUEST || $ID === null)
{
	echo renderTemplate('layout', [
		'title' => 'NOT FOUND',
		'page' => renderTemplate('/pages/404', []),
	]);
	exit;
}
if (!is_numeric($ID))
{
	echo nl2br('page not found' . PHP_EOL .  'a ne nado bylo moj url peredelyvat\', he-he =)');
	exit;
}