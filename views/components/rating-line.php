<?php
function displayRatingLine(array $dbMovies)
{
	echo '<div class="rating__line">';
	for ($i = 1; $i <= 10; $i++) {
		if ($i <= $dbMovies['rating'])
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