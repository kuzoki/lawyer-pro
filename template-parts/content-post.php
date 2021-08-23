<?php



get_header();
    $sidebar_op = get_field('display_side_bar_in_single_posts', 'option' );
    $page_id = get_queried_object_id();
    $news_hero = get_field('blog_hero', $page_id) ;  
    $class_side ='';
    if($sidebar_op == 'true'): $class_side = "col-lg-8 pe-lg-5"; $class_side_post = "col-lg-6"; else: $class_side = "col-12"; $class_side_post = "col-lg-4"; endif;
    
?>
    <!-- Hero -->
    <div class="hero hero-page" style="background: url(<?= esc_url($news_hero['background_image']) ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow"><?= esc_html($news_hero['eyebrow']) ?></p>
                <h2 class="hero-title mt-3"><?php if($news_hero['title']): echo esc_html($news_hero['title']); else:  echo esc_html(get_the_title( $page_id )); endif ?></h2>
                
            </div>
        </div>
    </div>


<!-- Content  -->

<div class="sec blog--posts">
    <div class="container">
        <div class="row">
            <div class="<?= esc_attr($class_side);?>">
                <div class="row">
                    <?php 
            
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post(); 
                    ?>
                        <div class="<?= esc_attr($class_side_post);?> margin">
                            <div class="single-post">
                                <a href="<?php esc_url(the_permalink()); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="blog image" class='img-blog-home'>
                                </a>
                                <div class="category-link my-2"><?= the_category();?></div>
                                <a class="post-title mb-1" href="<?php esc_url(the_permalink()); ?>" title="<?= esc_attr(get_the_title())?>"><?= wp_trim_words(get_the_title(),8,'..');?></a>
                                <div class="body-text date"><?php the_time('F j, Y');?> By <?= get_the_author() ?></div>
                            </div>
                        </div>
                    <?php 
                        
                        } 
                    } 
                    ?>  
                </div>

                <div class="pagination">
 
                    <?php the_posts_pagination( array(
                        
                        'prev_text' => __( '<i class="fas fa-angle-left"></i>', 'lawyer' ),
                        'next_text' => __( '<i class="fas fa-angle-right"></i>', 'lawyer' ),
                    ) ); ?>

                </div>
                
            </div>
            <?php     
                if($sidebar_op == 'true'): get_sidebar();  endif;
            ?>
        </div>
       
    </div>
    <?php get_template_part( 'template-parts/free_quot');?>                      
    
</div>
    
         

<?php

get_footer();