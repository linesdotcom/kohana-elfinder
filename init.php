<?php defined('SYSPATH') or die('No direct script access.');


Route::set('elfinder_media', 'elfinder/media(/<file>)', array('file' => '.+'))
	->defaults(array(
            'controller' => 'elfinder',
            'action'     => 'media',
            'file'       => NULL,
	)
);

Route::set('elfinder', 'elfinder(/<action>)')
        ->defaults(array(
            'controller'    => 'elfinder',
            'action'        => 'index'
        )
);
