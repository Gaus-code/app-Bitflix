<?php
/**
 * @var string $genre
 */
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php echo renderTemplate('components/movie-card', [
				'movies' => getMoviesByGenre($genre),
			]); ?>
		</div>
	</div>
</main>