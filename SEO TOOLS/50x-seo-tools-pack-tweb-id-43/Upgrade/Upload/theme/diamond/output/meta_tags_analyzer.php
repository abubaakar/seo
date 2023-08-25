<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools v2 - PHP Script
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
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

           <?php if ($pointOut != 'output') { ?>
           <br />
           <p><?php echo $lang['ATOZ23']; ?>
           </p>
           <form method="POST" action="<?php echo $toolOutputURL;?>" onsubmit="return fixURL();"> 
           <input type="text" name="url" id="url" value="" class="form-control"/>
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <div class="text-center">
           <input class="btn btn-info" type="submit" value="<?php echo $lang['ATOZ8']; ?>" name="submit"/>
           </div>
           </form>     
                      
           <?php 
           } else { 
           //Output Block
           if(isset($error)) {
            
            echo '<br/><br/><div class="alert alert-error">
            <strong>Alert!</strong> '.$error.'
            </div><br/><br/>
            <div class="text-center"><a class="btn btn-info" href="'.$toolURL.'">'.$lang['ATOZ12'].'</a>
            </div><br/>';
            
           } else {
           ?>
        <br />

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td><?php echo $lang['ATOZ29']; ?></td>
                <td><?php echo $myUrl; ?></td>
            </tr>
            <tr>
                <td><?php echo $lang['ATOZ30']; ?></td>
                <td><strong><?php echo $arr_meta[0]; ?></strong> <hr class="tableHr" /><span class="green"><?php echo str_replace('[count]', $arr_meta[4] ,$lang['ATOZAS15']); ?></span></td>
            </tr>
            <tr>
                <td><?php echo $lang['ATOZ31']; ?></td>
                <td><strong><?php echo $arr_meta[1]; ?></strong> <hr class="tableHr" /><span class="green"><?php echo str_replace('[count]', $arr_meta[5] ,$lang['ATOZAS16']); ?></span></td>
            </tr>
            <tr>
                <td><?php echo $lang['ATOZ32']; ?></td>
                <td><strong><?php echo $arr_meta[2]; ?></strong></td>
            </tr>
            <tr>
                <td><?php echo $lang['ATOZAS17']; ?></td>
                <td><strong><?php echo $arr_meta[6]; ?></strong></td>
            </tr>
            <?php if($arr_meta[8] != ''){ ?>
            <tr>
                <td><?php echo $lang['ATOZAS18']; ?></td>
                <td><strong><?php echo $arr_meta[8]; ?></strong></td>
            </tr>
            <?php } if($arr_meta[7] != ''){ ?>
            <tr>
                <td><?php echo $lang['ATOZ129']; ?></td>
                <td><strong><?php echo $arr_meta[7]; ?></strong></td>
            </tr>
            <?php } ?>
            <tr>
                <td><?php echo $lang['ATOZAS14']; ?></td>
                <?php if($arr_meta[3])
                    echo '<td><strong class="green">'.$lang['ATOZAS12'].'</strong></td>';
                else
                    echo '<td><strong class="red">'.$lang['ATOZAS13'].'</strong></td>'; ?>
            </tr>
        </tbody></table>

        <div class="text-center">
        <br /> &nbsp; <br />
        <a class="btn btn-info" href="<?php echo $toolURL; ?>"><?php echo $lang['ATOZ27']; ?></a>
        <br />
        </div>
        
        <?php } } ?>
        
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