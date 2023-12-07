<?php
require_once __DIR__ . '/../boot.php';
/**
 * @throws Exception
 */
$ID = $_GET['ID'] ?? '';
$connection = getDbConnection();
function checkId($ID): int
{
	if(($ID ?? ''))
	{
		$ID = isset($_GET['ID']) ? (string)$ID : $ID;
	}
	if (!is_numeric($ID))
	{
		echo nl2br('page not found' . PHP_EOL .  'a ne nado bylo moj url peredelyvat\', he-he =)');
		exit;
	}
	return $ID;
}

echo renderTemplate('layout',[
	'title' => option('TITLE', 'Bitflix :: About'),
	'page' => renderTemplate('pages/detail', [
		'dbMovies' => getMovieById($connection, checkId($ID)),
	]),
]);

