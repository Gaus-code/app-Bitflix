<?php

function convertMinutesToHours( ?int $minutes): string
{
	$hours = floor($minutes / 60);
	$remainingMinutes = $minutes % 60;
	return $hours . ':' . str_pad($remainingMinutes, 2, '0', STR_PAD_LEFT);
}
