<?php
defined("HOSTNAME") ? null : define("HOSTNAME", "localhost");
defined("USERNAME") ? null : define("USERNAME", "root");
defined("PASSWORD") ? null : define("PASSWORD", "");
defined("DBNAME") ? null : define("DBNAME", "model_db");

defined("DIR_ROOT") ? null : define("DIR_ROOT", __DIR__);
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

require_once DIR_ROOT . DS . "box/functions.php";
require_once DIR_ROOT . DS . "box/database.php";
require_once DIR_ROOT . DS . "box/baseobject.php";
require_once DIR_ROOT . DS . "box/admins.php";

?>