<?php
/**
 * @var array $genres;
 *
 */
require_once __DIR__ . '/../views/components/movie-card.php';
require_once __DIR__ . '/../boot.php';
$genre = $_GET['genre'];
function filterMoviesByGenre($genre)
{
	$connection = getDbConnection();
	$movies = getMovies();
	foreach ($movies as $movie)
	{
		$result = mysqli_query($connection, "SELECT movie.title, GROUP_CONCAT(genre.name) AS genres
		FROM movie
         JOIN movie_genre ON movie.id = movie_genre.movie_id
         JOIN genre ON movie_genre.genre_id = genre.id
		WHERE genre.name = '$genre'
		GROUP BY movie.title;");
		if (!$result)
		{
			throw new Exception(mysqli_error($connection));
		}
		generateMovieCard($movie);
	}

}
