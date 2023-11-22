<?php
function displayRatingLine(array $movie): array
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
	return $movie;
}
