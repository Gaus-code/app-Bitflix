<?php

function convertMinutesToHours( ?int $minutes): string
{
	$hours = floor($minutes / 60);
	$remainingMinutes = $minutes % 60;
	return $hours . ':' . str_pad($remainingMinutes, 2, '0', STR_PAD_LEFT);
}

function makeRatingLine($movie)
{
	echo '<div class="rating__line">';
	for ($i = 1; $i <= 10; $i++) {
		if ($i <= $movie['rating'])
		{
			echo '<span class="active"></span>';
		}
		else
		{
			echo '<span></span>';
		}
	}
	echo '</div>';
}
