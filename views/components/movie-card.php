<?php
function generateMovieCard(array $movie): string
{
	$card = '<div class="card">';
	$card .= '<img class="card__image" src="./assets/images/' . $movie['id'] . '.jpg' . '" alt="' . $movie['title'] . '">';
	$card .= '<div class="card__article">';
	$card .= '<h2 class="card__title">' . $movie['title'] . ' (' . $movie['release-date'] . ')' .'</h2>';
	$card .= '<h3 class="card__engTittle">' . $movie['original-title'] .'</h3>';
	$card .= '<div class="card__line">' . '</div>';
	$card .= '<p class="card__description">' . $movie['description'] .'</p>';
	$card .= '<div class="card__footer">';
	$card .= '<div class="card__footer_duration">';
	$card .= '<img src="../../assets/images/clockIcon.svg" alt="clock icon" class="card__footer_duration_icon">';
	$card .= '<p class="card__footer_duration_time">' . $movie['duration'] . ' мин. / ' . convertMinutesToHours($movie['duration']) .'</p>';
	$card.=  '</div>';
	$card .= '<p class="card__footer_genre">' . implode(", ", $movie['genres']) . "..." .'</p>';
	$card .= '</div>';
	$card .=  '</div>';
	$card .= '<div class="overlay">' . '</div>';
	$card .= '<div class="card__button">';
	$card .= '<a class="card__link" href="detail.php?ID=' . $movie['id'] . '">Подробнее' . '</a>';
	$card .= '</div>';
	$card .= '</div>';

	return $card;
}