
<?php 


$slider_settings = get_sub_field('slider_settings');
$display_options = $slider_settings['display_options'];
$number_of_team_members = $slider_settings['number_of_team_members'];
$order_by = $slider_settings['order_by'];
$order_type = $slider_settings['order_type'];

?>

<!-- Section Slider Team -->

<div class="sec team-slider">
    <div class="container position-relative">
        <div class="square-pattern" ">
                
        </div>
        <div class="flexslider-team" id="flexslider-team">
            <ul class="slides">
                <?php 
                        if($display_options == 'all'):
                            $num_per_page_team  = -1;
                        elseif($display_options == 'custom'):
                            $num_per_page_team  = $number_of_team_members;  
                        endif;

                        $args = array(
                            'post_type' => 'team',
                            'posts_per_page' => $num_per_page_team,
                            'orderby' => $order_by ,
                            'order'   => $order_type,
                        );
                        $team = new WP_Query($args);

                        while ($team->have_posts()):
                            $team->the_post();
                            $team_fields = get_field('attorney_setting');
                            if($team_fields['display_in_front']):
                                
                                $home_slider_description = $team_fields['home_slider_description'];
                ?>
                <li class="">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 position-relative">
                            <div class="slide-content">
                                <h3 class="sec-title">Meet <span><?= esc_html(the_title()) ?></span></h3>
                                <p class="quote mb-4" >
                                    <?= $home_slider_description['our_attorney_quote'] ?>
                                </p>
                                <p class="body-text mb-4"> 
                                    <?= $home_slider_description['attorney_excerpt'] ?>
                                </p>
                                
                                <a href="<?php esc_url(the_permalink()); ?>" class="read-more-btn float-end">read more <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 slide-image">
                            
                            <?php if($home_slider_description['image']):?>
                                <img src="<?= esc_url($home_slider_description['image']) ?>" class="img-fluid" alt="<?= esc_attr(the_title())?>">
                            <?php else:?>
                                <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/images/notfound.png" alt="<?= esc_attr(the_title())?>">
                            <?php endif;?>   
                        </div>
                    </div>
                    
                </li>
                <?php 
                    endif;
                endwhile;
                    wp_reset_query();
                ?>
            </ul>
        </div>
        <div class="custom-navigation text-center">
            <a href="#" class="flex-prev"><i class="fas fa-angle-left"></i></a>
            <a href="#" class="flex-next"><i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</div>