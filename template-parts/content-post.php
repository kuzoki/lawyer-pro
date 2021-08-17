<?php



get_header();
    $page_id = get_queried_object_id();
    $news_hero = get_field('blog_hero', $page_id) ;  
?>
    <!-- Hero -->
    <div class="hero hero-page" style="background: url(<?= $news_hero['background_image'] ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow"><?php echo $news_hero['eyebrow'] ?></p>
                <h2 class="hero-title mt-3"><?php if($news_hero['title']): echo $news_hero['title']; else:  echo get_the_title( $page_id ); endif ?></h2>
                
            </div>
        </div>
    </div>


<!-- Content  -->

<div class="sec blog--posts">
    <div class="container">
        <div class="row">
            <?php 
        
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
            ?>
                <div class="col-lg-4">
                    <div class="single-post">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="blog image" class='img-blog-home'>
                        </a>
                        <div class="category-link my-2"><?= the_category();?></div>
                        <a class="post-title mb-1" href="<?php the_permalink(); ?>" title="<?= get_the_title()?>"><?= wp_trim_words(get_the_title(),8,'..');?></a>
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
   
    
</div>
    
         

<?php

get_footer();