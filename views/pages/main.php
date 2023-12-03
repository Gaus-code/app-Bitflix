<?php
/**
 * @var array $movies
 * @var array $genres
 * @var array $dbMovies
 */

require_once "../views/components/movie-card.php";
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?= displayMovieList($dbMovies) ?>
		</div>
	</div>
</main>
