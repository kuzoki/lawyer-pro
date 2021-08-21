<?php 

    $settings = get_sub_field('settings');
    $add_paragraph_after_title = get_sub_field('add_paragraph_after_title');
    $group_para = get_sub_field('group_para');

    $display_options = $settings['display_options'];
    $number_of_team = $settings['number_of_team_areas'];
    $order_by = $settings['order_by'];
    $order_type = $settings['order_type'];

    

?>
    <!-- Practice Area Section Page -->
        <div class="team-sec sec">
            <div class="container">
                <h3 class="sec-title"><?= get_sub_field('title_text')?></h3>
                <!-- Text Area -->
                <?php if($add_paragraph_after_title == 'one'): ?>
                <div class="col-12 body-text mb-5">
                    <?= get_sub_field('paragraph_one_column')?>
                </div> 
                <?php elseif($add_paragraph_after_title == 'two'): ?>
                <div class="row mb-5">
                    <div class="col-lg-6 body-text"><?= $group_para['para_one']?></div>
                    <div class="col-lg-6 body-text"><?= $group_para['para_two']?></div>
                </div>
                <?php endif;?>
                <div class="row">
                    <?php 

                        if($display_options == 'all'):
                            $per_page_areas  = -1;
                        elseif($display_options == 'custom'):
                            $per_page_areas  = $number_of_team;  
                        endif;

                        // Arg Post Type
                        $args = array(
                            'post_type' => 'practice-areas',
                            'posts_per_page' => $per_page_areas,
                            'orderby' => $order_by ,
                            'order'   => $order_type,   
                        );
                        $areas = new WP_Query($args); 
                        while ($areas->have_posts()) {
                            $areas->the_post();  
                            
                            $practice_field = get_field('practice_areas_setting'); 
                    ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        
                        <img src="<?= $practice_field['featured_image'] ?>" class="mb-4" alt="Practice Area">
                        <h3 class="in-title"><?php the_title(); ?></h3>
                        <p class="body-text mb-2"><?= wp_trim_words( $practice_field['description'], 8, '...' );?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more-btn" title="<?php the_title(); ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        
                    </div>
                        
                    <?php 
                                   
                        }
                        wp_reset_query();
                    ?> 
                </div>     
                       
            </div>

        </div>  