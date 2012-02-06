<?php

interface elFinderILogger {
	public function log($cmd, $ok, $context, $err='', $errorData = array());
}