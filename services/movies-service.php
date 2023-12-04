<?php
/**
 * @var array $genres;
 *
 */
require_once __DIR__ . '/../views/components/movie-card.php';
require_once __DIR__ . '/../boot.php';
$genre = $_GET['genre'];

function filterMoviesByGenre()
{
	$selectedGenre = $_GET['genre'] ?? '';
	$connection = getDbConnection();
	$result = mysqli_query($connection, "
		SELECT movie.ID, movie.title, movie.ORIGINAL_TITLE, movie.DESCRIPTION, movie.DURATION, movie.RELEASE_DATE, GROUP_CONCAT(genre.name) AS genres
		FROM movie
		JOIN movie_genre ON movie.id = movie_genre.movie_id
		JOIN genre ON movie_genre.genre_id = genre.id
		WHERE genre.name = '$selectedGenre'
		GROUP BY movie.ID;
	");
	if (!$result && empty($selectedGenre))
	{
		throw new Exception(mysqli_error($connection));
	}

	$dbMovies = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$dbMovies[] = [
			'id' => $row['ID'],
			'title' => $row['title'],
			'original-title' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'release-date' => $row['RELEASE_DATE'],
			'genres' => $row['genres'],
		];
	}
	foreach ($dbMovies as $item)
	{
		generateMovieCard($item);
	}
}
