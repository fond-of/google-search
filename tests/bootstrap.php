<?php
use Doctrine\Common\Annotations\AnnotationRegistry;

define('APPLICATION_BASE_DIR', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);
define('VENDOR_DIR', APPLICATION_BASE_DIR . DS . 'vendor');
define('COMPOSER_AUTOLOADER', VENDOR_DIR . DS . 'autoload.php');
$loader = require COMPOSER_AUTOLOADER;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));