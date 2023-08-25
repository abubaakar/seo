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

$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS1', 'Set side-by-side domain\'s comparisons')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS2', 'Website URL')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS3', 'Competitor URL')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS4', 'Analyze')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS5', 'Everyone has competition. As a website owner, or an SEO or SEM practitioner, you will agree.')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS6', 'Analyzing Website')";
mysqli_query($con, $query);
$query = "INSERT INTO `lang` (`code`, `default_text`) VALUES ('MS7', 'Complete')";
mysqli_query($con, $query);

$query = "UPDATE lang SET en='Set side-by-side domain\'s comparisons' WHERE code='MS1'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Website URL' WHERE code='MS2'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Competitor URL' WHERE code='MS3'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Analyze' WHERE code='MS4'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Everyone has competition. As a website owner, or an SEO or SEM practitioner, you will agree.' WHERE code='MS5'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Analyzing Website' WHERE code='MS6'";
mysqli_query($con, $query);
$query = "UPDATE lang SET en='Complete' WHERE code='MS7'";
mysqli_query($con, $query);

unlink('upgrade.php');  
echo "<br> <b>Upgrade Completed!</b> <br>";
echo '<meta http-equiv="refresh" content="1;url=index.php">';

mysqli_close($con);
?>