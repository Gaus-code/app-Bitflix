<?php

/**
 * @var $page
 */
?>

<!doctype html>
<html lang="<?= option('LANG', 'ru') ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/main.css">
	<title><?= htmlspecialchars(option('TITLE', 'BITFLIX24')); ?></title>
</head>
<body>
	<div class="wrapper">
		<?php include "components/toolbar.php"; ?>
		<?php include "components/sidebar.php"; ?>
		<?= $page ?>
	</div>
</body>
</html>
