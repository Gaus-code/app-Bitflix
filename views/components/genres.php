<?php
global $movie
?>

<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?= filterMoviesByGenre($movie) ?>
		</div>
	</div>
</main>