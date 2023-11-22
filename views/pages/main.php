<?php
/**
 * @var array $movies
 * @var array $genres
 */
global $movies;
require_once "../data/movies-data.php";
require_once "../views/components/movie-card.php";
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php foreach ($movies as $movie): ?>
				<?= generateMovieCard($movie)?>
			<?php endforeach; ?>
		</div>
	</div>
</main>
