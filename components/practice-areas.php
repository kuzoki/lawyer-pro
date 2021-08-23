 
 
<?php 

    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $slider_settings = get_sub_field('slider_settings');
    $cta_button = get_sub_field('cta_button');
    $display_options = $slider_settings['display_options'];
    $number_of_practice_areas = $slider_settings['number_of_practice_areas'];
    $order_by = $slider_settings['order_by'];
    $order_type = $slider_settings['order_type'];

?>
 
 
 
<div class="practice-sec sec" id="practice-sec">
    <div class="container">


        <h3 class="sec-title"><?= esc_html($title)  ?></h3>
        <div class="pattern selectDisable">
            <img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/pattern1.png" alt="pattern">
        </div>
        <div class="shape"></div>
        <div class="text-sec">
            <p class="body-text"><?= $text?></p>

            <?php if($cta_button): ?>
                <a href="<?= esc_url($cta_button['url']) ?>" target="<?= esc_attr($cta_button['target']) ?>" class="cta-btn hollow-btn "><?= esc_html($cta_button['title']) ?> <i class="fas fa-chevron-right"></i></a>
            <?php endif?>
        </div>
        <!-- PRACTICE SLIDER -->
        <div class="practice-slider">
            <div class="flexslider-practice carousel">
                <ul class="slides">
                    <?php 
                        if($display_options == 'all'):
                            $num_per_page_prac  = -1;
                        elseif($display_options == 'custom'):
                            $num_per_page_prac  = $number_of_practice_areas;  
                        endif;

                        $args = array(
                            'post_type' => 'practice-areas',
                            'posts_per_page' => $num_per_page_prac,
                            'orderby' => $order_by ,
                            'order'   => $order_type,
                        );
                        $practice_areas = new WP_Query($args);

                            while ($practice_areas->have_posts()) {
                            $practice_areas->the_post();
                            $practice_areas_fields = get_field('practice_areas_setting');
                            if($practice_areas_fields['display_on_front_page_slider']){                   
                    ?>
                        
                        <li>
                            <div class="img-wrap">
                                <img src="<?= esc_url($practice_areas_fields['slider_image']); ?>" alt="practice image">
                                <div class="hover">
                                    <a href="<?php esc_url(the_permalink()); ?>" class="prac-name"><?php esc_html(the_title()); ?></a>
                                    <p class="body-text"><?= $practice_areas_fields['slider_excerpt']; ?></p>
                                    <a href="<?php esc_url(the_permalink()); ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php 
                        }}
                        wp_reset_query();
                    ?>  
                </ul>
                <!-- NEXT & PREV BUTTONS-->
                <div class="custom-control group">
                    <a href="#" class="flex-prev"><i class="fas fa-angle-left"></i> Prev</a>
                        <p>|</p>
                    <a href="#" class="flex-next">Next <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>




