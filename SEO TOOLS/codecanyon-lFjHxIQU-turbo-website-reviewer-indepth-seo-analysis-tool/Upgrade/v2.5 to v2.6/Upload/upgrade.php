<?php
session_start();
/**
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright 2022 ProThemes.Biz
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
$con = dbConncet($dbHost,$dbUser,$dbPass,$dbName);

$sql = "CREATE TABLE `pr24` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
  `moz_access_id` text,
  `moz_secret_key` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";

if (mysqli_query($con,$sql)) {
    //Success
    mysqli_query($con, "INSERT INTO `pr24` (`id`, `moz_access_id`, `moz_secret_key`) VALUES (1, '', '')");
} else {
    //Error
    echo "Table Already Exists";
}

define('ADMIN_DIR', ROOT_DIR.ADMIN_DIR_NAME.DIRECTORY_SEPARATOR);
define('ADMIN_CON_DIR', ADMIN_DIR.'controllers'.DIRECTORY_SEPARATOR);

$adminPanelLinks =
    '
       $menuBarLinks[\'5A\'] = array(true, \'Backlink API\',\'backlink-api\',\'fa fa-database\');
       ';
putMyData(ADMIN_CON_DIR.'links.php', $adminPanelLinks, FILE_APPEND);

unlink('upgrade.php');

echo "<br> <b>Upgrade Completed!</b> <br>";
echo '<meta http-equiv="refresh" content="1;url=index.php">';