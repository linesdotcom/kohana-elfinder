<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_elFinder {
	const VENDOR_VERSION = '1.2';
	const VENDOR_DIR = 'elfinder-1.2/';

	public $config = NULL;
	public $configJS = NULL;

	private static $_instance = array();

	private $_elFinder = NULL;

	public function __construct($config = 'default')
	{
		if (($path = Kohana::find_file('vendor', self::VENDOR_DIR . 'elFinder.init')))
		{
			ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . dirname(dirname($path)));
			require_once self::VENDOR_DIR . 'elFinder.init.php';

			$this->config = Kohana::$config->load('elfinder.'.$config);
			$this->configJS = Kohana::$config->load('elfinder-js');
			$this->_elFinder = new elFinder($this->config);
		}
	}

	public static function instance($config = 'default')
	{
		if (!isset(self::$_instance[$config]))
			self::$_instance[$config] = new Kohana_elFinder($config);

		return self::$_instance[$config];
	}

	public function start($elementID = 'finder')
	{
		return View::factory('elfinderJS')
			->bind('elementID', $elementID)
			->bind('finderLang', $this->configJS->lang);
	}

	public function run()
	{
		return $this->_elFinder->run();
	}
}