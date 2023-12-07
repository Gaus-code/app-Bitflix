<?php
/**
 * @var mysqli $connection
 */
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php echo renderTemplate('components/movie-card', [
				'title' => option('TITLE', 'BITFLIX24'),
				'movies' => getMovieList($connection),
			]);
			?>
		</div>
	</div>
</main>
