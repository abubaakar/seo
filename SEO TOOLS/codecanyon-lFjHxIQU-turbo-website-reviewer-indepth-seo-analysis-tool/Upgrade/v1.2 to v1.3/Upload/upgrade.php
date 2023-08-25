<?php

/*
* @author Balaji
* @name: Rainbow PHP Framework
* @copyright © 2017 ProThemes.Biz
*
*/

//Application Path
define('ROOT_DIR', realpath(dirname(__FILE__)) .DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR .'core'.DIRECTORY_SEPARATOR);
define('CONFIG_DIR', APP_DIR .'config'.DIRECTORY_SEPARATOR);

//Load Configuration & Functions
require CONFIG_DIR.'config.php';
require APP_DIR.'functions.php';

//Database Connection
$con = dbConncet($dbHost, $dbUser, $dbPass, $dbName);

$query = "ALTER TABLE `reviewer_settings` ADD `insights_api` TEXT NULL DEFAULT NULL";
mysqli_query($con, $query);

unlink('upgrade.php');  
echo "<br> <b>Upgrade Completed!</b> <br>";
echo '<meta http-equiv="refresh" content="1;url=index.php">';

mysqli_close($con);
?>