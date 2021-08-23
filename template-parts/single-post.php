<?php 

    // Single Post Template
    $sidebar_op = get_field('display_side_bar_in_single_posts', 'option' );
    $class_side ='';
    if($sidebar_op == 'true'): $class_side = "col-lg-8 pe-lg-5"; else: $class_side = "col-12"; endif;

?>
    <div class="hero hero-page" style="background: url(<?php echo get_field('big_single_page_image') ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <div class="eyebrow"><?php echo the_category();?></div>   
                <h2 class="hero-title mt-3"><?php echo the_title()?></h2>  
            </div>
        </div>
    </div>



<div class="sec single-post-block" id="post-<?php the_ID(); ?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($class_side);?>">
                <img src="<?php echo get_field('big_single_page_image') ?>" alt="post image" class="post-image mb-2">
                <div class="body-text date mb-2"><?php the_time('F j, Y');?> By <?php echo get_the_author() ?></div>

                <div class="body-text content">
                    <?php the_content(); ?>
                </div>
                <div class="my-5 border-top py-3 tags-link">
                    <?php esc_html(the_tags('Tags: ', ' ')) ?>
                </div>
                <div class="aut-sec">
                    <h3 class="in-title">About The Author</h3>
                    
                    <div class="aut-meta">
                        <?php echo  get_avatar( get_the_author_meta('email'), '80' ); ?>
                        <div>
                            <p class="body-text"><?php echo the_author_meta('description') ?></p>
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