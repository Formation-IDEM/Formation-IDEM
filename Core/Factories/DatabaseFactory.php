<?php
/**
 * DatabaseFactory
 */
namespace Core\Factories;

use \Core\Config;

class DatabaseFactory
{
	public static function initDB()
	{
		$cfg = Config::getInstance('database');
		$database = '\\Core\\Database\\' . $cfg->get('driver') . 'Database';
		return new $database($cfg->get('db_name'), $cfg->get('db_user'), $cfg->get('db_pass'), $cfg->get('db_host'));
	}
}