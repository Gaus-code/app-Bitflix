<?php
/**
 * @var string $genre
 * @var mysqli $connection
 */
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php echo renderTemplate('components/movie-card', [
				'movies' => getMoviesByGenre($connection, $genre),
			]); ?>
		</div>
	</div>
</main>