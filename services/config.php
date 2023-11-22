<?php
/**
 * @var array $config
 */

function getConfigValue(string $name, $defaultValue)
{
	static $config = null;
	if ($config === null)
	{
		$config = require ROOT . '/config.php';
	}

	if (array_key_exists($name, $config))
	{
		return $config[$name];
	}
	if ($defaultValue !== null)
	{
		return $defaultValue;
	}
	throw new Exception("Configuration {$name} not found");
}