<?php

namespace Xylio;

class imCall
{
	public function __construct() {
		print __FILE__ . PHP_EOL . __LINE__ . PHP_EOL;
		print "i'll break composer loader.";
	}
}