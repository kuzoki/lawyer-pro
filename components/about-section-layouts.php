

<?php 

    /*
    *   This Layout for The Group Of About Contain Different Options 
    */

    $image = get_sub_field('left_image');
    $group_info = get_sub_field('group_info');
    $featured_field = get_sub_field('featured_list');
    $option_fields = $group_info['option_fields'];
    $lists = $group_info['lists'];
    
  

?>

<div class="about-sec sec" id="about-sec">
    <div class="rec-shape"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                    
                <div class="about-img">
                    <img src="<?= $image ?>" class='img-fluid' alt="about img">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-text">
                    <h3 class="sec-title"><?= $group_info['title']; ?></h3>
                    <?php 
                        // Default Choice
                        if($option_fields == 'text'): 
                    
                    ?>  
                        <div class="body-text">
                            
                            <?= $group_info['text_field']; ?>
                        </div>
                    <?php 
                        // If choose List Style
                        elseif($option_fields == 'list'): 
                    ?>
                     <ul class="sessions">
                
                        <?php 
            
                            if( $lists ):
                            
                                foreach( $lists as $list ):
                        ?>           
                                 
                                <li>
                                    <div class="title"><?= $list['title'] ?></div>
                                    <p class="body-text"><?= $list['description'] ?></p>
                                </li>
                                
                        <?php      
                                endforeach;
                            
                            endif;
                        ?> 
                    </ul>
                    <?php endif; ?>     
                </div>
            </div>
        </div>

        <?php 
            
        ?>

        <div class="featured-sec mt-100 ">
            <!-- Featured Title -->               
            <h3 class="sec-title"><?= $featured_field['title'];?></h3>
            
            <?php if($featured_field['add_paragraph'] !== 'none'):?>
            <!-- Featured Paragraph -->        
            <div class="row para">
                <?php if($featured_field['add_paragraph'] == 'col-1'):?>

                    <div class="col-12 body-text">
                        <?= $featured_field['one_column_paragraph'] ?>
                    </div>

                <?php elseif($featured_field['add_paragraph'] == 'col-6'):; ?> 

                    <div class="col-6 body-text">
                        <?= $featured_field['tow_column_paragraph']['col_left'] ?>
                    </div>

                    <div class="col-6 body-text">
                        <?= $featured_field['tow_column_paragraph']['col_right'] ?>
                    </div>

                <?php endif; ?>       
            </div>
            <?php endif; ?>  
            
            <!-- Featured List -->
            <div class="row">
                <?php 
                    $featured_list = $featured_field['lists'];
                    if( $featured_list ):
                        
                        foreach( $featured_list as $list ):
                ?>
                <div class="col-lg-4 col-12 px-3">
                    <div class="single-feature d-flex">
                        <div class="feat-icon">
                                <img src="<?= $list['icon'] ?>" alt="feature icon">
                        </div>
                            
                        <div>
                            <p class="title"><?= $list['title'] ?></p>
                            <p class="body-text">
                                <?= $list['description'] ?>
                            </p>
                        </div>
                            
                    </div>
                </div> 

                <?php 
                        endforeach;
                    endif;
                
                ?>   
            </div>        
             
            <?php if($featured_field['add_stat_block'] !== 'none'):?>
            <!-- Stat Section  -->
            <div class="row stat-block mt-100 ">
                <?php 
                    $stat_lists = $featured_field['stats'];
                    if( $stat_lists ):
                        
                        foreach( $stat_lists as $stat_list ):
                ?>
                <div class="col-lg-3 col-sm-6 col-12 static"><span class="number"><?= $stat_list['number'] ?></span><span class="fact"><?= $stat_list['title'] ?></span></div>
                <?php 
                        endforeach;
                    endif;
                
                ?> 
            </div>
            <?php endif; ?>  
        </div>         
    </div>
</div>