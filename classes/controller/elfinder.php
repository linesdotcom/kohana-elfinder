<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example Connector controller for ElFinder
 */

class Controller_Elfinder extends Controller {

	private $_elFinder = NULL;

	public function before()
	{
		$this->_elFinder = Kohana_elFinder::instance();
		parent::before();
	}

	public function action_index()
	{
		if (!$this->_validReferrer())
			return FALSE;

		$this->_elFinder->run();
	}

	public function action_media()
	{
		$file = $this->request->param('file');

		$ext = pathinfo($file, PATHINFO_EXTENSION);
		$file = substr($file, 0, -(strlen($ext) + 1));

		if (($file = Kohana::find_file('media', $file, $ext)))
		{
			$this->response->check_cache(sha1($this->request->uri()) . filemtime($file), $this->request);
			$this->response->body(file_get_contents($file));
			$this->response->headers('content-type', File::mime_by_ext($ext));
			$this->response->headers('last-modified', date('r', filemtime($file)));
		}
		else
		{
			throw new HTTP_Exception_404('File not found.');
		}
	}

	private function _validReferrer()
	{
		$referrer = Request::current()->referrer();

		if (!$referrer)
			return FALSE;

		$parsed = parse_url($referrer);

		return ($parsed['host'] === APP_URL) ? TRUE : FALSE;
	}
}