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
var msgDomain = "<?php makeJavascriptStr($lang['ATOZ330'],true); ?>";
var msgTab1 = "<?php makeJavascriptStr($lang['ATOZ46'],true); ?>";
var msgTab2 = "<?php makeJavascriptStr($lang['ATOZ149'],true); ?>";
var msgTab3 = "<?php makeJavascriptStr($lang['ATOZ321'],true); ?>";
</script>
<script src='<?php createLink('core/library/googlecache.js',false,true); ?>'></script>

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
           <p><?php echo $lang['ATOZ320']; ?>
           </p>
           <textarea class="form-control" name="linksBox" id="linksBox" rows="3" style="height: 270px;"></textarea>
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