
    <?php 
    
        $background = get_sub_field('background_image');
        $title = get_sub_field('title_section');
        $slider_settings = get_sub_field('slider_settings');
    
    ?>

    <!-- Testimonials -->
    
    <div class="testimonials-sec sec" style='background-image: url(<?= esc_url($background) ?>);'>
        <div class="bg-layer"></div>
        <div class="container">
            <h3 class="sec-title center"><?= $title ?> </h3>
                <div class="flexslider-tes carousel">
                    <ul class="slides">

                        <?php 
                            if($slider_settings == 'all'): 
                                $num_per_page_tes = -1;
                            elseif($slider_settings == 'custom'):
                                $num_per_page_tes = get_sub_field('number_of_testimonials');    
                            endif;    

                                $args = array(
                                    'post_type' => 'testimonials',
                                    'posts_per_page' => $num_per_page_tes,
                                    
                                );
                                $testimonials = new WP_Query($args);

                                while ($testimonials->have_posts()) {
                                $testimonials->the_post();
                                $testimonials_fields = get_field('testimonials_setting');                   
                            ?>
                     
                                <li>
                                    <div class="tes-item">
                                        <div class="tes-img">
                                            <?php if($testimonials_fields['image_icon']): ?>
                                                <img src="<?= esc_url($testimonials_fields['image_icon']); ?>" alt="person"/>
                                            <?php else: ?> 
                                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/images/client-icon.png" alt="Attorney">
                                            <?php endif ?>  
                                            <p class="quote-icon">“</p>
                                        </div>
                                        <div class="tes-text">
                                            <p class="person-name"><?= esc_html($testimonials_fields['full_name']); ?></p>
                                            <p class="testimonial">
                                                <?= $testimonials_fields['what_the_say_about_us']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php 
                                
                                }
                                wp_reset_query();
                            ?>
                    </ul>
                        <!-- NEXT & PREV BUTTONS-->
                    <div class="custom-nav group">
                            <a href="#" class="flex-prev"><i class="fas fa-angle-left"></i></i></a>
                            <a href="#" class="flex-next"><i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>