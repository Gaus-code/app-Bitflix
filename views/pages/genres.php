<?php
/**
 * @var array $movies
 * @var array $genres
 */
global $movies;
?>

<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php foreach ($movies as $movie):?>
				<?= getFilteredMovies($movie)?>
			<?php endforeach; ?>
		</div>
	</div>
</main>