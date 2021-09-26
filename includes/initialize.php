<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
const DS = DIRECTORY_SEPARATOR;

const SITE_ROOT = DS . 'xampp' . DS . 'htdocs' . DS . 'globe_news_oop';

const LIB_PATH = SITE_ROOT . DS . 'includes';

// load config file first
require_once(LIB_PATH . DS . 'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH . DS . 'functions.php');

// load core objects
require_once(LIB_PATH . DS . 'session.class.php');
require_once(LIB_PATH . DS . 'database.class.php');
require_once(LIB_PATH . DS . 'database_object.class.php');
require_once(LIB_PATH . DS . 'pagination.class.php');

// load database-related classes
require_once(LIB_PATH . DS . 'ad.class.php');
require_once(LIB_PATH . DS . 'user.class.php');
