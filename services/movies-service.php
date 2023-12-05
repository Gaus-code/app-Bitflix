<?php

function generateGenresList(): array
{
	$connection = getDbConnection();

	$result = mysqli_query($connection, "SELECT NAME, CODE FROM genre;");

	if (!$result) {
		throw new Exception(mysqli_error($connection));
	}
	$genres = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$genres[] = [
			'name' => $row['NAME'],
			'code' => $row['CODE']
		];
	}
	foreach ($genres as $genre) {
		echo '<li class="aside__item">';
		echo '<a href="/index.php?genre=' . $genre['name'] . '" class="aside__link">' . $genre['name'] . '</a>';
		echo '</li>';
	}
	return $genres;
}
function getMovieList()
{
	$connection = getDbConnection();

	$result = mysqli_query($connection, "
		SELECT movie.ID, 
		movie.title,
		movie.ORIGINAL_TITLE,
		movie.DESCRIPTION,
		movie.DURATION,
		movie.RELEASE_DATE,
		GROUP_CONCAT(genre.name) AS GENRES
		FROM movie
		JOIN movie_genre ON movie.id = movie_genre.movie_id
		JOIN genre ON movie_genre.genre_id = genre.id
		GROUP BY movie.ID;
	");
	if (!$result) {
		throw new Exception(mysqli_error($connection));
	}

	$movies = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$movies[] = [
			'id' => $row['ID'],
			'title' => $row['title'],
			'originalTitle' => $row['ORIGINAL_TITLE'],
			'description' => $row['DESCRIPTION'],
			'duration' => $row['DURATION'],
			'releaseDate' => $row['RELEASE_DATE'],
			'genres' => $row['GENRES']
		];
	}
	return $movies;
}
function filterMoviesByGenre()
{
	$selectedGenre = $_GET['genre'];
	$movies = getMovieList();
	foreach ($movies as $movie)
	{
		$movieGenres = explode(',', $movie['genres']);
		if (in_array($selectedGenre, $movieGenres))
		{
			echo '<div class="card">';
			echo '<img src="./assets/images/' . $movie['id'] . '.jpg " alt="' . $movie['title'] . '"class="card__image">';
			echo '<div class="card__article">';
			echo '<h2 class="card__title">' . $movie['title'] . ' (' . $movie['releaseDate'] . ')</h2>';
			echo '<h3 class="card__engTittle">' . $movie['originalTitle'] . '</h3>';
			echo '<div class="card__line"></div>';
			echo '<p class="card__description">' . $movie['description'] . '</p>';
			echo '<div class="card__footer">';
			echo '<div class="card__footer_duration">';
			echo '<img src="../../assets/images/clockIcon.svg" alt="clock icon" class="card__footer_duration_icon">';
			echo '<p class="card__footer_duration_time">'. $movie['duration'] . ' мин. / ' . convertMinutesToHours($movie['duration']) . '</p>';
			echo '</div>';
			echo '<p class="card__footer_genre">' . mb_strimwidth($movie['genres'], 0, 30, "...") . '</p>';
			echo '</div>';
			echo '</div>';
			echo '<div class="overlay"></div>';
			echo '<div class="card__button"><a class="card__link" href="detail.php?ID='. $movie['id'] . '">Подробнее</a></div>';
			echo '</div>';
		}
	}
}