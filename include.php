<?php
header("content-type:text/html;charset=utf8");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());
require_once 'vendor/autoload.php';
require_once 'neo4j.func.php';
require_once 'people.inc.php';
require_once 'active.inc.php';
require_once 'feedback.inc.php';
require_once 'common.func.php';
require_once 'configs.php';
require_once 'images.func.php';
require_once 'string.func.php';
connectionToNeo4j();

