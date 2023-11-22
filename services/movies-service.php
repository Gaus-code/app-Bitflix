<?php
/**
 * @var array $movies
 * @return string
 */
require_once __DIR__ . '/../views/components/movie-card.php';
function getFilteredMovies(array $movie)
{
	$genres = $movie['genres'];
	$values = array_chunk($genres, 1);
	foreach ($values as $genre)
	{
		if (implode($genre) === $_GET['genre'])
		{
			echo generateMovieCard($movie);
		}
	}
}
