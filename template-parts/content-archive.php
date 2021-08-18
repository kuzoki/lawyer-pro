<?php 
    
    $sidebar_op = get_field('display_side_bar_in_single_posts', 'option' );
    $eyebrow_search_page = get_field('eyebrow_search_page', 'option' );
    $eyebrow_category_page = get_field('eyebrow_category_page', 'option' );
    $eyebrow_tag_page = get_field('display_side_bar_in_single_posts', 'option' );
    $class_side ='';
    if($sidebar_op == 'true'): $class_side = "col-lg-8 pe-lg-5"; else: $class_side = "col-12"; endif;

    $sub_title = '';
    $title = '';
    if(is_category()): 

        $sub_title = $eyebrow_category_page ;
        $title = single_cat_title( '', false );
        $args = array(
            'category_name'	=>$title,		
        );

    elseif(is_tag()):
        $sub_title = $eyebrow_tag_page; 
        $title = single_tag_title( '', false );
        $args = array(		
            'tag' => $title,
        );
    elseif(is_search()):
        $search = get_search_query();
        $sub_title = $eyebrow_search_page;
        $title = $search;
        $args = array(
            's'	=>$search,
                    
        );
    endif;    


?>
    
<!-- Hero -->
    <div class="hero hero-page" style="background: url(<?= get_field('background_image_hero_for_archive', 'option') ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow"><?= $sub_title;?></p>
                <h2 class="hero-title mt-3"><?= $title;?></h2>
                
            </div>
        </div>
    </div>


<!-- Content  -->

<div class="sec blog--posts">
    <div class="container">
        <div class="row">
            <div class="<?= $class_side;?>">
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
                <div class="blue--block container text-center my-5">
                    <h3>Speak With Our Experts Today!</h3>
                    <a href="/contact" class="cta-btn round-btn-secondary">Get free Quot</a>
                </div>
            </div>
            <?php     
                if($sidebar_op == 'true'): get_sidebar();  endif;
            ?>
        </div>
       
    </div>
   
    
</div>