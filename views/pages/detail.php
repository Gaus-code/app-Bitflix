<?php
/**
 * @var array $dbMovies
 */

?>
<main class="info">
	<div class="info__container">
		<div class="info__content">
			<?php foreach ($dbMovies as $movie):  ?>
				<?php if ($movie['id'] === $_GET['ID']):?>
					<div class="info__header">
						<div class="info__title">
							<h1><?= $movie['title'] . ' (' . $movie['releaseDate'] . ')'?></h1>
							<div class="info__engTitle">
								<p><?= $movie['originalTitle'] ?></p>
								<div class="minAge"><?= $movie['ageRestriction'] ?>+</div>
							</div>
						</div>
						<div class="heartWrapper">
							<button class="heartBtn">
								<img class="heartBtn__image" id="emptyHeart" src="./assets/images/emptyHeart.svg" alt="don't leave my heart broken">
							</button>
						</div>
					</div>
					<div class="line"></div>
					<div class="info__main">
						<div class="info__image">
							<img src="./assets/images/<?= $movie['id'] ?>.jpg" alt="inside out preview">
						</div>
						<div class="info__main_container">
							<div class="rating">
								<?php displayRatingLine($movie); ?>
								<div class="rating__result"><?= $movie['rating'] ?></div>
							</div>
							<div class="info__main_title">
								<h2>О фильме</h2>
								<ul class="info__list">
									<li class="info__item">
										<p class="info__key">Год производства:</p>
										<p class="info__value"><?= $movie['releaseDate'] ?></p>
									</li>
									<li class="info__item">
										<p class="info__key">Режиссер:</p>
										<p class="info__value"><?= $movie['director'] ?></p>
									</li>
									<li class="info__item">
										<p class="info__key">В главных ролях:</p>
										<p class="info__value"> <?= $movie['cast'] ?></p>
									</li>
								</ul>
							</div>
							<div class="info__description">
								<h2>Описание</h2>
								<p> <?= $movie['description'] ?></p>
							</div>
						</div>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</div>
	</div>
</main>
<script src="../../assets/scripts/index.js"></script>