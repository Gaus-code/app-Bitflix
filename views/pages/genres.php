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
				<?php $genres = $movie['genres'];?>
				<?php $values = array_chunk($genres, 1);?>
				<?php foreach ($values as $genre): ?>
					<?php if (implode($genre) === $_GET['genre']): ?>
						<div class="card">
							<img class="card__image" alt="poster" src="<?= './assets/images/' . $movie['id'] . '.jpg';?>">
							<div class="card__article">
								<h2 class="card__title"><?= $movie['title'] . ' (' . $movie['release-date'] . ')'?></h2>
								<h3 class="card__engTittle"><?= $movie['original-title']?></h3>
								<div class="card__line"></div>
								<p class="card__description"><?= $movie['description']?></p>
								<div class="card__footer">
									<div class="card__footer_duration">
										<img src="../../assets/images/clockIcon.svg"  alt='clock icon' class="card__footer_duration_icon">
										<p class="card__footer_duration_time"><?= $movie['duration'] ?> мин. / <?= convertMinutesToHours($movie['duration'])?></p>
									</div>
									<p class="card__footer_genre"><?= implode(", ", $movie['genres']) . "..."; ?></p>
								</div>
							</div>
							<div class="overlay"></div>
							<div class="card__button"><a class='card__link' href="<?= 'detail.php?ID='. $movie['id'] ?>">Подробнее</a></div>
						</div>
					<?php endif;?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
	</div>
</main>