<?php 

    // Single Post Template
    $sidebar_op = get_field('display_side_bar_in_single_posts', 'option' );
    $class_side ='';
    if($sidebar_op == 'true'): $class_side = "col-lg-8 pe-lg-5"; else: $class_side = "col-12"; endif;

?>
    <div class="hero hero-page" style="background: url(<?= get_field('big_single_page_image') ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <div class="eyebrow"><?= the_category();?></div>   
                <h2 class="hero-title mt-3"><?= the_title()?></h2>  
            </div>
        </div>
    </div>



<div class="sec single-post-block">
    <div class="container">
        <div class="row">
            <div class="<?= $class_side;?>">
                <img src="<?= get_field('big_single_page_image') ?>" alt="post image" class="post-image mb-2">
                <div class="body-text date mb-2"><?php the_time('F j, Y');?> By <?= get_the_author() ?></div>

                <div class="body-text content">
                    <?php the_content(); ?>
                </div>
                <div class="aut-sec">
                    <h3 class="in-title">About The Author</h3>
                    
                    <div class="aut-meta">
                        <?=  get_avatar( get_the_author_email(), '80' ); ?>
                        <div>
                            <p class="body-text"><?= the_author_description() ?></p>
                        </div>
                    </div>
                </div>    
                <div class="comment-sec">
                    <?php 
                        
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>  
                </div>
            </div>
            
            <?php     
               if($sidebar_op == 'true'): get_sidebar();  endif;
            ?>
        </div>

          
    </div>
  
    
</div>