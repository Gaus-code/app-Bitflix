<?php
require_once __DIR__ . '/../components/rating-line.php';
function generateDetailCard(array $dbMovies)
{
		$card = '<div class="info__header">';
			$card .= '<div class="info__title">';
				$card .= '<h1>' . $dbMovies['title'] . ' (' . $dbMovies['releaseDate'] . ')' . '</h1>';
				$card .= '<div class="info__engTitle">';
					$card .= '<p>' . $dbMovies['originalTitle'] .'</p>';
					$card .= '<div class="minAge">' . $dbMovies['ageRestriction'] . '+' . '</div>';
				$card .= '</div>';
			$card .= '</div>';
			$card .= '<div class="heartWrapper">';
				$card .= '<button class="heartBtn">' ;
					$card .= '<img class="heartBtn__image" id="emptyHeart" src="/assets/images/emptyHeart.svg" alt="do not leave my heart empty">';
				$card .= ' </button>';
			$card .= '</div>';
		$card .= '</div>';
		$card .= '<div class="line">' . '</div>';
		$card .= '<div class="info__main">';
			$card .= '<div class="info__image">' . '<img src="/assets/images/' . $dbMovies['id'] .'.jpg" alt="inside out preview">' . '</div>';
			$card .= '<div class="info__main_container">';
				$card .= '<div class="rating">' . displayRatingLine($dbMovies) . '<div class="rating__result">' . $dbMovies['rating'] . '</div>' . '</div>';
				$card .= '<div class="info__main_title">';
					$card .= '<h2>О фильме</h2>';
					$card .= '<ul class="info__list">';
						$card .= '<li class="info__item">';
							$card .= '<p class="info__key">Год производства:</p>';
							$card .= '<p class="info__value">'.$dbMovies['releaseDate'].'</p>';
						$card .= '</li>';
						$card .= '<li class="info__item">';
							$card .= '<p class="info__key">Режиссер:</p>';
							$card .= '<p class="info__value">'.'ТУТ ДОЛЖЕН БЫТЬ РЕЖЖИСЕР'.'</p>';
						$card .= '</li>';
						$card .= '<li class="info__item">';
							$card .= '<p class="info__key">В главных ролях:</p>';
							$card .= '<p class="info__value">'.'ТУТ ДОЛЖЕН БЫТЬ КАСТ'.'</p>';
						$card .= '</li>';
					$card .= '</ul>';
				$card .= '</div>';
				$card .= '<div class="info__description">' . '<h2>Описание</h2>' . '<p>'.  $dbMovies['description'] .'</p>' . '</div>';
			$card .= '</div>';
		$card .= '</div>';
		echo($card);
		return $card;
}
