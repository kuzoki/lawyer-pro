<?php 
   $practice_content = get_field('practice_areas_setting');
?>
<div class="hero hero-page" style="background: url(<?= $practice_content['single_page_background_hero'] ?>);">
    <div class="bg-layer"></div>
    <div class="container">
        <div class="hero-content">
                <p class="eyebrow">Practice Area</p>
                <h2 class="hero-title mt-3"><?php if($title): echo $title; else:  echo get_the_title(); endif ?></h2>
        </div>
    </div>
</div>

<!-- Content -->

<div class="single-practice sec">
    <div class="container">
        <div class="row">
            <div class="col-3 side-list">
                <div class="side-title-pr"></div>
                <ul class="list-pr">
                    <h3>practice areas</h3>
                  
                    
                    <?php 
                    // Arg Post Type
                        $title_Current = get_the_title();
                        $args = array(
                            'post_type' => 'practice-areas',
                            'posts_per_page' => -1,    
                        );
                        $practice_list = new WP_Query($args); 
                        while ($practice_list->have_posts()) {
                            $practice_list->the_post();  
                                            
                            
                    ?>

                    <li>
                        <a href="<?php the_permalink(); ?>" class="<?php if( $title_Current === get_the_title() ): echo 'active-pr'; else: echo ''; endif; ?>">
                            <?= the_title() ?>
                        </a>
                    </li>
                    <?php 
                                   
                        }
                        wp_reset_query();
                    ?> 
                    
                </ul>   
            </div>
            <div class="col-9 content-practice">
                <?php 
                    if($practice_content['featured_image_single_practice_page']):
                ?>
                
                    <img src="<?= $practice_content['featured_image_single_practice_page']?>" alt="practice Image">
                <?php endif;?>
                    <h3 class="sec-title"><?= get_the_title() ?></h3>   
                    
                    <div class="body-text">
                        <?= $practice_content['description']?>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="sec team-related pt-0 team-sec">
    <div class="container">
        <h2 class="sec-title">Our Specialized Attorneys</h2>   
                 
        <div class="row">
            <?php 
                // Arg Post Type
                $val = get_the_title();
                $args = array(
                    'post_type' => 'team',
                    'posts_per_page' => -1,
                    'meta_query' => [
                        //'relation' => 'OR',
                        //'relation' => 'AND',
                        [
                            'key' => 'attorney_setting_global_info_specialty',
                            'compare' => 'LIKE',
                            'value' => $val
                        ],
                    ],  
                );
                $attorneys = new WP_Query($args); 
                    while ($attorneys->have_posts()) {
                    $attorneys->the_post();  
                                
                    $attorneys_fields = get_field('attorney_setting'); 
                    
                  
                ?>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="warp">
                        <?php if($attorneys_fields['about_page_image']):?>
                            <img src="<?= $attorneys_fields['about_page_image'] ?>" alt="attorney">
                        <?php else:?>
                            <img src="<?= get_template_directory_uri() ?>/assets/images/notfound.png" alt="attorney">
                        <?php endif;?>  
                      
                            
                        <div class="text-warp">
                            <h3 class="name"><?= $attorneys_fields['global_info']['first_name'] ?><?= $attorneys_fields['global_info']['last_name'] ?></h3>
                            
                            <p class="role body-text text-capitalize">
                                <?= $attorneys_fields['global_info']['specialty'] ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                            
            <?php                             
                }
                wp_reset_query();
            ?> 
        </div>
    </div> 
    
    
    
        
</div>

<?php get_template_part( 'template-parts/free_quot');?>   