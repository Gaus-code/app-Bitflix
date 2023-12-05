<?php
$selectedGenre = $_GET['genre'];
?>
<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php echo renderTemplate('components/movie-card', [
				'movies' => getMoviesByGenre(getMovieList(), $selectedGenre),
			]); ?>
		</div>
	</div>
</main>