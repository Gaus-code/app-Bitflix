<?php
/**
 * @var array $movies
 * @var array $genres
 */
require_once "./../data/movies-data.php";
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
