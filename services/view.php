<?php
function renderTemplate(string $path, array $variables = []): string
{
	if (!preg_match('/^[0-9A-Za-z\/_-]+$/', $path))
	{
		return 'Invalid template path';
	}
	$absolutePath = ROOT . "/views/$path.php";

	if (!file_exists($absolutePath))
	{
		return 'Invalid template path';
	}

	extract($variables);

	ob_start();

	require $absolutePath;

	return ob_get_clean();
}