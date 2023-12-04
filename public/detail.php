<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ . '/../views/components/detail-card.php';
/**
 * @var array $genres ;
 * @var array $movies ;
 * @var array $movie ;
 */
function getMovieInfo() :array
{
	$ID = $_GET['ID'] ?? '';
	$connection = getDbConnection();
	$result = mysqli_query($connection, "SELECT * FROM movie WHERE id = '$ID';");
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}
	$dbMovies = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$dbMovies[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'originalTitle' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'ageRestriction' => $row['AGE_RESTRICTION'],
			'releaseDate' => $row['RELEASE_DATE'],
			'rating' => $row['RATING'],
			'directorID' => $row['DIRECTOR_ID'],
		];

	}
	foreach ($dbMovies as $movie)
	{
		if ($movie['id'] === $ID)
		{
			generateDetailCard($movie);
		}
	}
	foreach ($dbMovies as $movie)
	{
		array_filter($dbMovies, function ($ID) use ($movie)
		{
			return $movie['id'] === $ID;
		});
	}
	return $dbMovies;
}


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



echo renderTemplate('layout',[
	'title' => getConfigValue('TITLE', 'Bitflix :: About'),
	'page' => renderTemplate('pages/detail', [
		'movie' => $movie,
		'movies' => $movies,
	]),
	'movie' => $movie,
]);