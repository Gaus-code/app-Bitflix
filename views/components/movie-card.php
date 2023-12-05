<?php
/**
 * @var array $movies
 */
?>

<?php foreach ((array)$movies as $movie): ?>
	<div class="card">
		<img src="<?= './assets/images/' . $movie['id'] . '.jpg' ?>" alt="<?= $movie['title']?>" class="card__image">
		<div class="card__article">
			<h2 class="card__title"><?= $movie['title'] . ' (' . $movie['releaseDate'] . ')'?></h2>
			<h3 class="card__engTittle"><?= $movie['originalTitle'] ?></h3>
			<div class="card__line"></div>
			<p class="card__description"><?= mb_strimwidth($movie['description'], 0, 180, "...") ?></p>
			<div class="card__footer">
				<div class="card__footer_duration">
					<img src="../../assets/images/clockIcon.svg" alt="clock icon" class="card__footer_duration_icon">
					<p class="card__footer_duration_time"><?= $movie['duration'] ?> мин. / <?= convertMinutesToHours($movie['duration'])?></p>
				</div>
				<p class="card__footer_genre">
					<?= mb_strimwidth($movie['genres'], 0, 30, "...") ?>
				</p>
			</div>
		</div>
		<div class="overlay"></div>
		<div class="card__button"><a class="card__link" href="<?= 'detail.php?ID='. $movie['id'] ?>">Подробнее</a></div>
	</div>
<?php endforeach; ?>
