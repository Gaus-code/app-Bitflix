<?php

function generateMovieCard(array $dbMovies)
{
	$card = '<div class="card">';
	$card .= '<img class="card__image" src="./assets/images/' . $dbMovies['id'] . '.jpg' . '" alt="' . $dbMovies['title'] . '">';
	$card .= '<div class="card__article">';
	$card .= '<h2 class="card__title">' . $dbMovies['title'] . ' (' . $dbMovies['release-date'] . ')' .'</h2>';
	$card .= '<h3 class="card__engTittle">' . $dbMovies['original-title'] .'</h3>';
	$card .= '<div class="card__line">' . '</div>';
	$card .= '<p class="card__description">' . $dbMovies['description'] .'</p>';
	$card .= '<div class="card__footer">';
	$card .= '<div class="card__footer_duration">';
	$card .= '<img src="../../assets/images/clockIcon.svg" alt="clock icon" class="card__footer_duration_icon">';
	$card .= '<p class="card__footer_duration_time">' . $dbMovies['duration'] . ' мин. / ' . convertMinutesToHours($dbMovies['duration']) .'</p>';
	$card.=  '</div>';
	$card .= '<p class="card__footer_genre">' . $dbMovies['genres'] . '</p>';
	$card .= '</div>';
	$card .=  '</div>';
	$card .= '<div class="overlay">' . '</div>';
	$card .= '<div class="card__button">';
	$card .= '<a class="card__link" href="detail.php?ID=' . $dbMovies['id'] . '">Подробнее' . '</a>';
	$card .= '</div>';
	$card .= '</div>';
	echo($card);
}