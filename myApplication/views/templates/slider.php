<?php
    if($slider)
    {
    ?>

    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">

            <?php
                for($i = 0; $i < count($slider); $i++)
                {
                    if(strlen($slider[$i]['link']) > 0)
                    {
                    ?>
                    <a href="<?php echo $slider[$i]['link']; ?>">
                        <img src="<?php echo assets_url(); ?>images/upload/<?php echo $slider[$i]['picture']; ?>" data-thumb="<?php echo assets_url(); ?>images/upload/thumb/<?php echo $slider[$i]['picture']; ?>" alt="" title="#caption<?php echo $slider[$i]['id']; ?>"  />
                    </a>
                    <?php
                    }
                    else
                    {
                    ?>

                    <img src="<?php echo assets_url(); ?>images/upload/<?php echo $slider[$i]['picture']; ?>" data-thumb="<?php echo assets_url(); ?>images/upload/thumb/<?php echo $slider[$i]['picture']; ?>" alt="" title="#caption<?php echo $slider[$i]['id']; ?>" />       

                    <?php
                    }
                }
            ?>

        </div>

        <?php
            for($a = 0; $a < count($slider); $a++)
            {
                if(strlen($slider[$a]['title']) > 1)
                {
                ?>
                <div id="caption<?php echo $slider[$a]['id']; ?>" class="nivo-html-caption">
                    <p class="nivotitle v2"><span class="yekan"><?php echo $slider[$a]['title']; ?></span></p> 
                </div>
                <?php
                }
                else
                {
                    ?>
                    <div id="caption<?php echo $slider[$a]['id']; ?>" class="nivo-html-caption">
                    </div>
                    <?php
                }
            }
        ?>

        <div class="main-wrapper app-wrapper">  
            <div class="clearfix"></div>
        </div>            
    </div>    
    <!-- End Main Slider -->

    <?php
    }
?>