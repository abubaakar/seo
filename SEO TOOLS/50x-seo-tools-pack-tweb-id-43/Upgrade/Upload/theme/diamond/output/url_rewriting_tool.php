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
           <input type="text" name="url" id="url" value="" class="form-control" placeholder="http://www.example.com/test.php?firstid=1&secondid=10 "/>
           <br />
           <?php if ($toolCap) echo $captchaCode; ?>
           <input class="btn btn-info" type="submit" value="<?php echo $lang['ATOZ8']; ?>" name="submit"/>
           </form>
           <br />       
           Eg. http://www.example.com/test.php?firstid=1&secondid=10
           <br />            
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
        <b><?php echo $lang['ATOZ37']; ?></b><br />

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td><strong><?php echo $lang['ATOZ38']; ?></strong></td>
                <td><?php echo $sht_url; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['ATOZ39']; ?></strong></td>
                <td><?php echo $sht_ex_url; ?></td>
            </tr>
        </tbody></table>
                                
<?php echo $lang['ATOZ40']; ?><br />
<?php echo $lang['ATOZ41'].' '.$my_domain; ?><br />
<textarea rows="3" style="height: 220px;" class="form-control"><?php   echo $sht_data; ?></textarea>

<br /> <br /> <b><?php echo $lang['ATOZ42']; ?></b> <br />

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td><strong><?php echo $lang['ATOZ38']; ?></strong></td>
                <td><?php echo $dht_url; ?></td>
            </tr>
            <tr>
                <td><strong><?php echo $lang['ATOZ39']; ?></strong></td>
                <td><?php echo $dht_ex_url; ?></td>
            </tr>
        </tbody></table>

    <?php echo $lang['ATOZ40']; ?><br />
    <?php echo $lang['ATOZ41'].' '.$my_domain; ?><br />
    <textarea rows="3" style="height: 220px;" class="form-control"><?php   echo $dht_data; ?></textarea>
    
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