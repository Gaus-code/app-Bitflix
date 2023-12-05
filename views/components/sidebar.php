<?php

/**
 * @var array $genres
 */
?>
<aside class="aside">
	<div class="aside__container">
		<div class="aside__logo">
			<a href="/" class="aside__logo_link">
				<img src="/assets/images/logo.svg" alt="bitflix logo" class="logo">
			</a>
		</div>
		<nav class="aside__nav">
			<ul class="aside__list">
				<li class="aside__item">
					<a href="/" class="aside__link">Главная</a>
				</li>
				<?php generateGenresList();?>
				<li class="aside__item">
					<a href="/favourite.php" class="aside__link">Избранное</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>