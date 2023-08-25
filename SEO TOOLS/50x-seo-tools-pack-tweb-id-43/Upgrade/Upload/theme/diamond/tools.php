<?php
defined('APP_NAME') or die(header('HTTP/1.0 403 Forbidden'));
/*
 * @author Balaji
 * @name: A to Z SEO Tools - PHP Script
 * @theme: Default Style
 * @copyright © 2017 ProThemes.Biz
 *
 */
?>
<style>
.thumbnail .caption {
    color: #333;
    margin-bottom: 5px;
    text-align: center;
}
.imageres {
    height: auto;
    max-width: 100%;
    padding: 5px;
    vertical-align: middle;
}
</style>

  <div class="container main-container">

	<div class="row">
    
        <?php
        if($themeOptions['general']['sidebar'] == 'left')
            require_once(THEME_DIR."sidebar.php");
        ?>  
        <div class="col-md-9 top40">
      
        <?php
        $count = 1;
        $smCount = 0;
        $oneTime  = 0;
        $tools_count =count($tools);
        $loop = 0; 
        foreach ($tools as $tool)
        {  
            $loop++;
            if ($count==1)
            {
            $smCount++;
            if($smCount == 4){
                if($oneTime == 0){
                    $oneTime =1;
                    //echo '<div class="text-center moreToolsBut"><button class="btn btn-info" id="browseTools">Browse More Tools</button></div>';
                }
                echo '<div class="row">';
                $smCount--;
            }else{
                echo '<div class="row">';
            }    

            } 
            if(!file_exists(THEME_DIR.$tool[2]))
            $tool[2] = themeLink("icons/no_image.png", true); 
            echo '   <div class="col-md-3">
                        <div class="thumbnail">
                            <a class="seotoollink" data-placement="top" data-toggle="tooltip" data-original-title="'.$tool[0].'" title="'.$tool[0].'" href="'.$tool[1].'"><img alt="'.$tool[0].'" src="'.themeLink($tool[2],true).'" class="seotoolimg" />
                            <div class="caption">
                                    '.$tool[0].'
                            </div></a>
                        </div>
                    </div>';
                    if ($loop == 20)
                    { ?>
                        <div class="xd_top_box">
                            <?php echo $ads_468x70; ?>
                        </div>
                   <?php }
            if ($tools_count==$loop)
            { 
           // if ($count==4)
            echo '</div><!-- /.row -->';
            $count = 0;
            }
                if ($count==4)
                {
                $count = 0;
                echo '</div><!-- /.row -->';
                } 
                $count++;   
               
        } 
        ?>
        
      

  		</div>
          
        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>      
  	</div>
</div> <br /> <br />