<?php
namespace Core\Factories;
/**
 * ModelFactory.php
 */

class ModelFactory
{
	public static function loadModel($model)
	{
		$className = '\\App\\Models\\' . ucfirst($model) . 'Model';
		return new $className(DatabaseFactory::db());
	}
}