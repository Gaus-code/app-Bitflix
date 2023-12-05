<?php
require_once __DIR__ . '/../boot.php';
require_once __DIR__ .'/../views/components/rating-line.php';
/**
 * @throws Exception
 * @var array $dbMovies ;
 */
function getMovieInfo(): array
{
	$ID = $_GET['ID'] ?? '';
	$connection = getDbConnection();

	$result = mysqli_query($connection, "
		SELECT m.ID, 
		m.TITLE,
		m.ORIGINAL_TITLE,
		m.RELEASE_DATE,
		m.DESCRIPTION,
		m.RATING,
		m.AGE_RESTRICTION,
		d.name AS DIRECTOR,
		GROUP_CONCAT(a.name) AS CAST
		FROM movie m
		JOIN movie_actor ma ON m.id = ma.movie_id
		JOIN actor a ON ma.actor_id = a.id
		JOIN director d ON m.director_id = d.id
		WHERE m.ID = '$ID'
		GROUP BY m.ID;
	");

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
			'director' => $row['DIRECTOR'],
			'cast' => $row['CAST'],
		];
	}
	return $dbMovies;
}

echo renderTemplate('layout',[
	'title' => option('TITLE', 'Bitflix :: About'),
	'page' => renderTemplate('pages/detail', [
		'dbMovies' => getMovieInfo(),
	]),
]);

