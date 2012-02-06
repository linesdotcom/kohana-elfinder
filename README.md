# kohana-elfinder

elFinder 1.2 integration module for Kohana 3.2.
elFinder configuration see http://elrte.org/redmine/projects/elfinder/wiki/Connector_Configuration_EN#PHP

# Requirements
* jQuery
* jQuery UI

# Setup

* Add catalog for files eg. uploaded-adm at DOCROOT. Chmod 777 catalog.
* Add elFinder.css to <head> when you start elFinder. 
``
    <link rel="stylesheet" href="<?php echo URL::site(Route::get('elfinder_media')->uri(array('file' => 'css/elfinder.css')), TRUE); ?>" type="text/css" media="screen" />
``
* Example of use ( View page file ):
``
    <?php echo Kohana_elFinder::instance()->start('elFinder'); ?>
    <div id="elFinder">dsfdsfsda</div>
``
    
# Author
Developer: Mateusz "retio" Lerczak - kiki.diavo@gmail.com

#License
Kohana-elfinder is issued under a MIT license.