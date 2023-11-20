<?php

/**
 * @var string $title
 * @var array $genres
 * @var $page
 */
require_once "../data/index.php";
?>

<!doctype html>
<html lang="<?= GetConfigValue('LANG', 'ru') ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/main.css">
	<title><?= htmlspecialchars($title); ?></title>
</head>
<body>
	<div class="wrapper">
		<?php include "components/toolbar.php"; ?>
		<?php include "components/sidebar.php"; ?>
		<?= $page ?>
	</div>
</body>
</html>
