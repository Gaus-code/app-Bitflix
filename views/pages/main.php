<?php
$movies = getMovieList();

?>

<main class="main">
	<div class="main__container">
		<div class="cards__container">
			<?php echo renderTemplate('components/movie-card', [
				'title' => option('TITLE', 'BITFLIX24'),
				'movies' => $movies,
			]);
			?>
		</div>
	</div>
</main>
