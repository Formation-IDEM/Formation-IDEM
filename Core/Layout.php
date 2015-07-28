<?php
namespace Core;

use App\Exceptions\LayoutException;

/**
 * Class Layout
 *
 * @package Core
 */
class Layout
{
	private $path;
	private static $_instance;

	public function __construct($path = 'App/Views')
	{
		$this->path = $path;
	}

	/**
	 * Singleton
	 *
	 * @return Layout
	 */
	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Layout();
		}
		return self::$_instance;
	}

	/**
	 * Récupère le fichier appelé
	 *
	 * @param $file
	 * @param array $data
	 * @return string
	 * @throws LayoutException
	 */
	private function getFile($file, $data = [])
	{
		if( is_file(ROOT . $this->path . '/' . $file . '.tpl.php') )
		{
			ob_start("ob_gzhandler");
			extract($data);
			require_once(ROOT . $this->path . '/' . $file . '.tpl.php');
			$content = ob_get_contents();
			ob_end_clean();

			return $content;
		}
		throw new LayoutException('Le fichier de template ' . $file . ' n\'existe pas');
	}

	/**
	 * Génère la vue
	 *
	 * @param $file
	 * @param $data
	 * @throws LayoutException
	 */
	public function render($file, $data)
	{
		$content = $this->getFile($file, $data);
		require_once(ROOT . $this->path . '/layouts/layout.tpl.php');
	}
}