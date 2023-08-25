<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>

<style>
.percentbox {
    text-align: center;
    font-size: 18px;
}
.percentimg {
    text-align: center;
    display: none;
}
#resultBox{
    display:none;
}
</style>
<script>
var sucMsg = "<?php makeJavascriptStr($lang['ATOZ143'],true); ?>";
var errMsg = "<?php makeJavascriptStr($lang['ATOZ144'],true); ?>";
var smErr = "<?php makeJavascriptStr($lang['ATOZ145'],true); ?>";
var msgDomain = "<?php makeJavascriptStr($lang['ATOZ222'],true); ?>";
var msgName = "<?php makeJavascriptStr($lang['ATOZ223'],true); ?>";
var msgUpdate = "<?php makeJavascriptStr($lang['ATOZ224'],true); ?>";
var msgRss = "<?php makeJavascriptStr($lang['ATOZ225'],true); ?>";
var msgTab1 = "<?php makeJavascriptStr($lang['ATOZ226'],true); ?>";
var msgTab2 = "<?php makeJavascriptStr($lang['ATOZ69'],true); ?>";
</script>
<script src='<?php createLink('core/library/blogping.js',false,true); ?>'></script>

  <div class="container main-container">
	<div class="row">
      	    <?php
            if($themeOptions['general']['sidebar'] == 'left')
                require_once(THEME_DIR."sidebar.php");
            ?>
          	<div class="col-md-8 main-index">
            
            <div class="xd_top_box">
             <?php echo $ads_720x90; ?>
            </div>
                <h2 id="title"><?php echo $data['tool_name']; ?></h2>
                
                <div id="mainbox">
           	
               <?php if ($pointOut != 'output') { ?>
               <br />
               <p><?php echo $lang['ATOZ222']; ?>
               </p>
               <input type="text" id="myurl" value="" class="form-control"/>
               <br />
               <p><?php echo $lang['ATOZ223']; ?>
               </p>
               <input type="text" id="blogNameData" value="" class="form-control"/>
               <br />
               <p><?php echo $lang['ATOZ224']; ?>
               </p>
               <input type="text" id="myBlogUpdateUrlData" value="" class="form-control"/>
               <br />
               <p><?php echo $lang['ATOZ225']; ?>
               </p>
               <input type="text" id="myBlogRSSFeedUrlData" value="" class="form-control"/>
               <input type="hidden" id="authCode" value="<?php echo $secKey.$secVal; ?>" />
               <br />
               <?php if ($toolCap) echo $captchaCode; ?>
               <div class="text-center">
               <a class="btn btn-info" style="cursor:pointer;" id="checkButton"><?php echo $lang['ATOZ8']; ?></a>
               </div>     
               </div>           
               <?php 
               } 
               ?>
            <div id="resultBox">
            <div class="percentimg">
            <img src="<?php themeLink('img/load.gif'); ?>" />
            <br />
            <?php echo $lang['ATOZ146']; ?>...
            <br />
            </div>

            <div id="results"></div>

            <div class="text-center">
            <br /> &nbsp; <br />
            <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['ATOZ27']; ?></a>
            <br />
            </div>
            </div>
             <br />
            <div class="xd_top_box">
            <?php echo $ads_720x90; ?>
            </div>
            
            <h2 id="sec1" class="about_tool"><?php echo $lang['ATOZ11'].' '.$data['tool_name']; ?></h2>
            <p>
            <?php echo $data['about_tool']; ?>
            </p> <br />
            </div>              
                        
            <?php
            if($themeOptions['general']['sidebar'] == 'right')
                require_once(THEME_DIR."sidebar.php");
            ?>      		
        </div>
    </div> <br />