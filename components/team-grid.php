<?php 

    $settings = get_sub_field('settings');
    $add_paragraph_after_title = get_sub_field('add_paragraph_after_title');
    $group_para = get_sub_field('group_para');

    $display_options = $settings['display_options'];
    $number_of_team = $settings['number_of_team_members'];
    $order_by = $settings['order_by'];
    $order_type = $settings['order_type'];

    

?>
    <!-- Team Section About Page -->
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
                <div class="row text-center">
                    <?php 

                        if($display_options == 'all'):
                            $per_page_team  = -1;
                        elseif($display_options == 'custom'):
                            $per_page_team  = $number_of_team;  
                        endif;

                        // Arg Post Type
                        $args = array(
                            'post_type' => 'team',
                            'posts_per_page' => $per_page_team,
                            'orderby' => $order_by ,
                            'order'   => $order_type,   
                        );
                        $attorneys = new WP_Query($args); 
                        while ($attorneys->have_posts()) {
                            $attorneys->the_post();  
                            
                            $attorneys_fields = get_field('attorney_setting'); 
                    ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="warp">
                            <?php if($attorneys_fields['about_page_image']):?>
                                <img src="<?= esc_url($attorneys_fields['about_page_image']) ?>" alt="<?= esc_attr(the_title())?>">
                            <?php else:?>
                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/images/notfound.png" alt="<?= esc_attr(the_title())?>">
                            <?php endif;?>    
                            <div class="text-warp">
                                <h3 class="name"><?= esc_html($attorneys_fields['global_info']['first_name']) ?> <?= esc_html($attorneys_fields['global_info']['last_name']) ?></h3>
                                <p class="role body-text"><?= esc_html($attorneys_fields['global_info']['specialty']) ?></p>
                               <a href="<?php esc_url(the_permalink()); ?>" class="read-more">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
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