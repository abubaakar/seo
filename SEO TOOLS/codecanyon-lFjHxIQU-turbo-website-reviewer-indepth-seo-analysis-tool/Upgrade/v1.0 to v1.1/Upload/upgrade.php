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

$query = "ALTER TABLE `rainbow_track` CHANGE `h0` `h0` BLOB NULL DEFAULT NULL, CHANGE `h2` `h2` BLOB NULL DEFAULT NULL, CHANGE `h4` `h4` BLOB NULL DEFAULT NULL,
CHANGE `h6` `h6` BLOB NULL DEFAULT NULL, CHANGE `h8` `h8` BLOB NULL DEFAULT NULL, CHANGE `h10` `h10` BLOB NULL DEFAULT NULL,
CHANGE `h12` `h12` BLOB NULL DEFAULT NULL, CHANGE `h14` `h14` BLOB NULL DEFAULT NULL, CHANGE `h16` `h16` BLOB NULL DEFAULT NULL,
CHANGE `h18` `h18` BLOB NULL DEFAULT NULL, CHANGE `h20` `h20` BLOB NULL DEFAULT NULL, CHANGE `h22` `h22` BLOB NULL DEFAULT NULL";
mysqli_query($con, $query);

if (mysqli_errno($con)){
    echo "<br> <br> <b>Upgrade failed!</b>";
} else {
    unlink('upgrade.php');  
    echo "<br> <b>Upgrade Completed!</b> <br>";
    echo '<meta http-equiv="refresh" content="1;url=index.php">';
}
mysqli_close($con);
?>