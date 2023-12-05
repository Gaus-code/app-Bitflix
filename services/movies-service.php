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
function getMovieList(): array
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
function generateFilterMovieCard()
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
			echo '<p class="card__description">' . mb_strimwidth($movie['description'], 0, 180, "..."). '</p>';
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

function getMovieById(): array
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