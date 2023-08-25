<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name: A to Z SEO Tools v2 - PHP Script
 * @copyright � 2018 ProThemes.Biz
 *
 */

$pageTitle = 'Recent History';
$subTitle = 'Recent Access History';
$fullLayout = 1; $footerAdd = $status = true; $footerAddArr = array();

//Delete a Domain
if($pointOut == 'delete'){
    if(isset($args[1])){
        $deleteId = escapeTrim($con, $args[1]);
        
        if($args[0] == 'domain')
            $query = "DELETE FROM atoz_recent_history WHERE id='$deleteId'";

        $result = mysqli_query($con, $query);
        
        if (mysqli_errno($con))
            $msg = errorMsgAdmin(mysqli_error($con));
        else 
            $msg = successMsgAdmin('Domain deleted from history list');
    }
}

?>