<?php

/**
 * @throws Exception
 */

function getDbConnection()
{
	static $connection = null;

	if ($connection === null)
	{
		$dbHost = getConfigValue('DB_HOST');
		$dbUser = getConfigValue('DB_USER');
		$dbPassword = getConfigValue('DB_PASSWORD');
		$dbName = getConfigValue('DB_NAME');

		$connection = mysqli_init();
		$connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName);

		if (!$connected)
		{
			$error = mysqli_connect_errno() . ': ' . mysqli_connect_error();
			throw new Exception($error);
		}

		$encodingResult = mysqli_set_charset($connection, 'utf8');

		if (!$encodingResult)
		{
			throw new Exception(mysqli_error($connection));
		}
	}

	return $connection;
}
