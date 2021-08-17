<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ritsu-Blog_Template
 */

get_header();
    
    
?>

    <!-- TRUST BADGES SECTION -->
    <?php $trust_budges = get_field('comapany_logo') ;
    
    if($trust_budges['hide_trust_home'] != true):

    ?>
        <div class="trusted-sec" id="trusted-sec">
            <div class="container group">

                
                <div class="title-part">
                    <p><?php echo $trust_budges['title_section']; ?></p>
                </div>
                <div class="trust-badges group">
                    <img src="<?php echo $trust_budges['logo_company_1']; ?>" alt="badge">
                    <img src="<?php echo $trust_budges['logo_company_2']; ?>" alt="badge">
                    <img src="<?php echo $trust_budges['logo_company_3']; ?>" alt="badge">
                </div>
            </div>
        </div>
    <?php endif; ?>


    <!-- ABOUT -->

        <?php $about_sec = get_field('about_us_section') ;
        
            if($about_sec['hide_about_home'] != true):
        
        ?>
        <div class="about-sec group" id="about-sec">
            <div class="rec-shape"></div>
            <div class="container">
                <div class="row">
                    <div class="col-1-2">
                    
                        <div class="about-img">
                            <img src="<?php echo $about_sec['about_image']; ?>" alt="about img">
                        </div>
                    </div>
                    <div class="col-1-2">
                        <div class="about-text">
                            <h3 class="sec-title"><?php echo $about_sec['about_info']['title']; ?></h3>
                            <p class="body-text">
                                <?php echo $about_sec['about_info']['text']; ?>
                            </p>
                            
                        </div>
                    </div>
                </div>

                    <?php $why_choose_us = get_field('why_choose_us');
                            if($why_choose_us['hide_choose_home'] != true):
                    ?>

                <div class="row">
                    <div class="col-1">
                        <div class="why-us-sec group">
                        
                            <h3 class="sec-title"><?php echo $why_choose_us['title']; ?></h3>
                            <div class="why-features">
                                <div class="col-1-3">
                                    <div class="single-feature">
                                        <div class="feat-icon">
                                            <img src="<?php echo $why_choose_us['raison_1']['icon']; ?>" alt="feature icon">
                                        </div>
                                        <div class="feat-text">
                                            <p class="title"><?php echo $why_choose_us['raison_1']['title']; ?></p>
                                            <p class="body-text">
                                                <?php echo $why_choose_us['raison_1']['small_text']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="single-feature">
                                        <div class="feat-icon">
                                            <img src="<?php echo $why_choose_us['raison_2']['icon_2']; ?>" alt="feature icon">
                                        </div>
                                        <div class="feat-text">
                                            <p class="title"><?php echo $why_choose_us['raison_2']['title_2']; ?></p>
                                            <p class="body-text">
                                                <?php echo $why_choose_us['raison_2']['small_text_2']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="single-feature">
                                        <div class="feat-icon">
                                            <img src="<?php echo $why_choose_us['raison_3']['icon_3']; ?>" alt="feature icon">
                                        </div>
                                        <div class="feat-text">
                                            <p class="title"><?php echo $why_choose_us['raison_3']['title_3']; ?></p>
                                            <p class="body-text">
                                                <?php echo $why_choose_us['raison_3']['small_text_3']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?> 
            </div>
        </div>

        <?php endif; ?>   
    <!-- PRACTICE AREAS -->

        <?php $practice_area_info = get_field('practice_area_section') ;  
            if($practice_area_info['hide_practice_home'] != true):
        ?>
            <div class="practice-sec group" id="practice-sec">
                <div class="container group">
                    

                    <h3 class="sec-title"><?php echo $practice_area_info['title']; ?></h3>
                    <div class="pattern selectDisable">
                        <img src="<?php echo get_template_directory_uri( ) ?>/assets/images/pattern1.png" alt="pattern">
                    </div>
                    <div class="shape"></div>
                    <div class="text-sec">
                        <p class="body-text">
                            <?php echo $practice_area_info['text']; ?>
                        </p>
                    
                        
                            
                            <?php 
                                    $practice_link_phone = $practice_area_info['link_phone'];
                                    if ($practice_link_phone): ?>
                                    <a href="<?php echo $practice_link_phone['url']; ?>" class="btn" target="<?php echo $practice_link_phone['target']; ?>"><?php echo $practice_link_phone['title']; ?><i class="fas fa-phone"></i></a>
                                    
                            <?php endif;

                                if($practice_area_info['link_view_more']): ?>
                                
                                <a href="<?php echo $practice_area_info['link_view_more']['url']; ?>" class="btn" target="_blank"><?php echo $practice_area_info['link_view_more']['title']; ?></a>

                            <?php   endif  ?>
                            
                            
                    </div>
                 <!-- PRACTICE SLIDER -->
                    <div class="practice-slider">
                        <div class="flexslider-practice carousel">
                            <ul class="slides">
                            <?php 
                                $num_per_page_prac = -1;
                                
                                $order_prac= $practice_area_info['slider_setting']['order'];
                                $order_by_prac = $practice_area_info['slider_setting']['order_by'];

                                

                                if($practice_area_info['slider_setting']['number_display'] != -1 ){
                                    $num_per_page_prac  = $practice_area_info['slider_setting']['number'];
                                }

                                $args = array(
                                    'post_type' => 'practice-areas',
                                    'posts_per_page' => $num_per_page_prac,
                                    'orderby' => $order_by_prac ,
                                    'order'   => $order_prac,
                                );
                                $practice_areas = new WP_Query($args);

                                while ($practice_areas->have_posts()) {
                                $practice_areas->the_post();
                                $practice_areas_fields = get_field('practice_areas_setting');
                                if($practice_areas_fields['display_on_front_page_slider']){                   
                            ?>
                        
                                <li>
                                    <div class="img-wrap">
                                        <img src="<?php echo $practice_areas_fields['slider_image']; ?>" alt="practice image">
                                        <div class="hover">
                                            <a href="<?php the_permalink(); ?>" class="prac-name"><?php the_title(); ?></a>
                                            <p class="body-text"><?php echo $practice_areas_fields['slider_excerpt']; ?></p>
                                            <a href="<?php the_permalink(); ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
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
        <?php endif; ?>  
        
        
    <!-- TESTIMONIALS -->

        <?php $testimonials_sec = get_field('testemonials_section') ;
            if($testimonials_sec['hide_testemonials_home'] != true):
        ?>
            <div class="testimonials-sec" style='background-image: url(<?php echo $testimonials_sec['background_image'] ?>);'>
                <div class="bg-dark"></div>
                <div class="container">
                    <h3 class="sec-title center"><?php echo $testimonials_sec['title']; ?></h3>
                    <div class="flexslider-tes carousel">
                        <ul class="slides">

                            <?php 
                                $num_per_page_tes = -1;
                                
                                if($testimonials_sec['slider_setting']['number_of_testimonial_to_display'] != -1 ){
                                    $num_per_page_tes  = $testimonials_sec['slider_setting']['number'];
                                }

                                $args = array(
                                    'post_type' => 'testominials',
                                    'posts_per_page' => $num_per_page_tes,
                                    
                                );
                                $testimonials = new WP_Query($args);

                                while ($testimonials->have_posts()) {
                                $testimonials->the_post();
                                                    
                            ?>
                            <?php $testimonials_fields = get_field('testimonials_setting'); 
                            
                                    
                            ?>

                                <li>
                                    <div class="tes-item">
                                        <div class="tes-img">
                                            <img src="<?php echo $testimonials_fields['image_icon']; ?>" alt="person"/>
                                            <p class="quote-icon">“</p>
                                        </div>
                                        <div class="tes-text">
                                            <p class="person-name"><?php echo $testimonials_fields['full_name']; ?></p>
                                            <p class="testimonial">
                                                <?php echo $testimonials_fields['what_the_say_about_us']; ?>
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
        <?php endif; ?> 

    <!-- MEET THE TEAM / SLIDER -->
        <?php $team_section = get_field('team_section');
            if($team_section['hide_team_home'] != true):
        ?>                   
            <div class="big-container" >
                <div class="container">
                    <div class="slider-container">
                        <div class="square-pattern">
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/images/pattern6.png" alt="pattern">
                        </div>
                        <!-- FLIXSLIDER -->
                        <div class="flexslider" id="flexslider">
                            <ul class="slides clearfix">
                            <?php 
                                $num_per_page_team = -1;
                                
                                $order_team = $team_section['slider_setting']['order'];
                                $order_by_team = $team_section['slider_setting']['order_by'];

                                

                                if($team_section['slider_setting']['number_of_teamto_display'] != -1 ){
                                    $num_per_page_team  = $team_section['slider_setting']['number'];
                                }


                                $args = array(
                                    'post_type' => 'attornys',
                                    'posts_per_page' => -1,
                                    'orderby' => $order_by_team ,
                                    'order'   => $order_team,
                                    // 'order'				=> $order_team
                                );
                                $attornys = new WP_Query($args);

                                while ($attornys->have_posts()) {
                                $attornys->the_post();
                                                     
                            ?>
                            <?php $attornys_fields = get_field('attorney_setting'); 

                                    if($attornys_fields['display_in_front'] != true):
                            ?>
                                <li>
                                    <div class="flex-order">
                                        <div class="text-slide">
                                            <h2>Meet <span class="name"><?php echo $attornys_fields['first_name']; ?> <?php echo $attornys_fields['last_name']; ?></span></h2>
                                            <p class="quote">
                                                <?php echo $attornys_fields['home_slider_description']['our_attorney_quote']; ?></span>
                                            </p>
                                            <div class="txt-content">
                                                <div class="body-text">
                                                    <?php echo $attornys_fields['home_slider_description']['attorney_excerpt']?>
                                                </div>
                                                
                                            </div>
                                            <!-- READ MORE BTN -->
                                            <a href="<?php the_permalink(); ?>" class="btn-txt">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                        </div>
                                        <div class="slide-img">
                                            <img src="<?php echo $attornys_fields['home_slider_description']['image']; ?>" alt="slide img" >
                                        </div>
                                    </div>
                                </li>
                                
                            <?php 
                                    endif;
                                }
                                wp_reset_query();
                            ?>   
                            </ul>
                        </div>
                        <!-- NEXT & PREV BUTTONS-->
                        <div class="custom-navigation">
                            <a href="#" class="flex-prev"><i class="fas fa-angle-left"></i></i></a>
                            <a href="#" class="flex-next"><i class="fas fa-angle-right"></i></a>
                        </div>
                        
                    </div>
                    <div class='attorny-link' >
                        <a href="<?php get_site_url() ?>/attornys" class="btn">View All Attornys</a>
                        
                    </div>
                    
                </div>
            </div>
        <?php endif; ?>                     


    <!-- FAQ -->
        <?php $frequently_asked_section = get_field('frequently_asked_section');
            if($frequently_asked_section['hide_faq_home'] != true):
        ?>
            <div class="faq-sec group">
                <div class="container">
                    <h3 class="sec-title center"><?php echo $frequently_asked_section['title'] ?></h3>
                    <div class="row">
                        <div class="col-1-2">
                            <div class="questions-col">
                            <?php 

                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => 10,
                                    'order'   => 'ASC',
                                
                                );
                                
                                $faq = new WP_Query($args);

                                while ($faq->have_posts()) {
                                $faq->the_post();
                                $id_q = get_the_ID();  
                                $faq_fields = get_field('faq_setting');                 
                            ?>
                        

                                <div class="question" data-ques-nbr="<?php echo $id_q ?>">
                                    <p class="number" data-nbr="nbr<?php echo esc_attr( $faq->current_post + 01 );?>"><?php if($faq->current_post < 9){echo "0";}?><?php echo esc_attr( $faq->current_post + 01 );?></p>
                                    <p><?php echo $faq_fields['question']; ?></p>
                                </div>

                            <?php 
                                }
                                wp_reset_query();
                            ?>    
                            </div>
                        </div>
                        <div class="col-1-2">
                            <div class="answers-col">
                            <?php 

                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => 10,
                                    'order'   => 'ASC',
                                );

                                $faq_ans = new WP_Query($args);

                                while ($faq_ans->have_posts()) {
                                $faq_ans->the_post();
                                $id_a = get_the_ID();  
                                $faq_fields = get_field('faq_setting');                
                            ?>
                                <div class="answer " id="answer-<?php echo esc_attr( $faq->current_post + 01 );?>" data-answer-nbr="<?php echo $id_a ?>">
                                    <p class="body-text">
                                        <?php echo $faq_fields['answer']; ?>
                                    </p>
                                
                                </div>

                            <?php 
                                }
                                wp_reset_query();
                            ?>    
                                <?php if($frequently_asked_section['link']): ?>
                                <div class="more-questions">
                                    <p><?php echo $frequently_asked_section['small_title'] ?></p>
                                    <a href="<?php echo $frequently_asked_section['link']['url'] ?>" class="btn" target="<?php echo $frequently_asked_section['link']['target'] ?>"><?php echo $frequently_asked_section['link']['title'] ?></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>  

    <!-- BLOG POSTS -->
        <?php $blog_sec = get_field('blog_section');
            if($blog_sec['hide_blog_home'] != true):
        ?>
        <div class="blog-sec group" id="blog-sec">
            <div class="container">
                <h3 class="sec-title center"><?php echo $blog_sec['title']  ?></h3>
                <div class="row">
                    <?php 

                        $num_per_page_post = -1;
                                
                        $order_post = $blog_sec['blog_setting']['order'];
                        $order_by_post = $blog_sec['blog_setting']['order_by'];

                                

                        if($blog_sec['blog_setting']['post_number'] != -1 ){
                             $num_per_page_prac  = $blog_sec['blog_setting']['number'];
                        }

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $num_per_page_prac,
                            'orderby' => $order_by_post ,
                            'order'   => $order_post,
                        );
                        $blog = new WP_Query($args);

                        while ($blog->have_posts()) {
                        $blog->the_post();
                                        
                    ?>       
                    <div class="<?php echo $blog_sec['blog_setting']['column_style'] ?>">
                        <div class="single-post">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="blog image" class='img-blog-home'>
                            </a>
                            <span class="tag"><?php echo the_category();?></span>
                            <a href="<?php the_permalink(); ?>" class="post-title"><?php echo get_the_title();?></a>
                            <p class="date"><?php the_time('F jS, Y');?> by <span href="#" class="author"><?php the_author();?></span></p>
                        </div>
                    </div>
                    <?php 
                            }
                            wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>  

    <!-- CONTACT -->
        <?php $contact_section = get_field('contact_section');
            if($contact_section['hide_contact_home'] != true): ?>
            <div class="contact-sec">
                <div class="bg-layer"></div>
                <div class="container">
                    <h3 class="sec-title"><?php echo $contact_section['section_title']  ?></h3>
                    <div class="content-container group">
                        <div class="forms-bg group" style='background-image: url(<?php echo $contact_section['contact_form_setting']['contact_form_background']  ?>);background-size: cover;'>
                            <div class="forms-pattern selectDisable">
                                <!-- <img src="<?php echo $contact_section['contact_form_setting']['contact_form_background']  ?>" alt="pattern"> -->
                            </div>
                            <p class="title"><?php echo $contact_section['contact_form_setting']['contact_form_title']  ?></p>
                            <?php $contatct_form = $contact_section['contact_form_setting']['contact_form'] ;
                                if( $contatct_form ): 
                                    foreach( $contatct_form as $p ): // variable must NOT be called $post (IMPORTANT) 
                                    $cf7_id= $p->ID;
                                    echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                                    endforeach;
                            endif; ?>
                            
                            
                            
                        </div>
                        <div class="info-group">
                            <p class="info-title"><?php echo $contact_section['contact_info']['title']  ?></p>
                            <div class="row">
                                <div class="col-1-2">
                                    <div class="info">
                                        <?php $ad_link = $contact_section['contact_info']['address']['address_link']   ?>
                                        <img src="<?php echo $contact_section['contact_info']['address']['address_icon']   ?>" alt="contact icon">
                                        <a href="<?php echo  $ad_link['url'] ?>" target="<?php echo  $ad_link['target'] ?>" ><?php echo  $ad_link['title'] ?></a>
                                    </div>
                                
                                    <div class="info">
                                        <img src="<?php echo $contact_section['contact_info']['email_icon'] ?>" alt="contact icon">
                                        <a href="mailto:<?php echo $contact_section['contact_info']['Email'] ?>"><?php echo $contact_section['contact_info']['Email'] ?></a>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="info">
                                        <img src="<?php echo $contact_section['contact_info']['phone_icon'] ?>" alt="contact icon">
                                        <div>
                                            <a href="tel:<?php echo $contact_section['contact_info']['phone_number_1'] ?> "><?php echo $contact_section['contact_info']['phone_number_1'] ?></a>
                                            <a href="tel:<?php echo $contact_section['contact_info']['phone_number_2'] ?> "><?php echo $contact_section['contact_info']['phone_number_2'] ?></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="google-map">
                            <div id="map">
                            <?php echo $contact_section['contact_info']['map'] ?>
                            </div>
                        </div>

                        <!-- GOOGLE MAP SCRIPT -->
                        <!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCO5gB5AYjVEtuZxzRDMCOQ8_PEXikYRcg"></script>
                        <script>
                            // Create and Initialise the Map (required) our google map below
                            google.maps.event.addDomListener(window, 'load', init);
                            function init() {
                                // Basic options for a simple Google Map
                                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                                var mapOptions = {
                                    // How zoomed in you want the map to start at (always required)
                                    zoom: 13,
                                    scrollwheel: false,
                                    // The latitude and longitude to center the map (always required)
                                    center: new google.maps.LatLng(33.948006, -83.377319), // Athens, GA
                                    // How you would like to style the map. 
                                    // This is where you would paste any style found on [Snazzy Maps][1].
                                    // copy the Styles from Snazzy maps,  and paste that style info after the word "styles:"
                                    styles:
                                    [
                                        {
                                            "featureType": "administrative",
                                            "elementType": "labels.text",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "poi",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "off"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "transit.station.rail",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "simplified"
                                                },
                                                {
                                                    "saturation": "-100"
                                                }
                                            ]
                                        },
                                        {
                                            "featureType": "water",
                                            "elementType": "all",
                                            "stylers": [
                                                {
                                                    "visibility": "on"
                                                }
                                            ]
                                        }
                                    ]
                                };
                                var mapElement = document.getElementById('map');
                                // Create the Google Map using out element and options defined above
                                var map = new google.maps.Map(mapElement, mapOptions);
                                // Following section, you can create your info window content using html markup
                                var contentString = '<div id="content">' +
                                    '<div id="siteNotice">' +
                                    '</div>' +
                                    '<h1 id="firstHeading" class="firstHeading">Athens Injury Law</h1>' +
                                    '<div id="bodyContent">' +
                                    '<p><b>Personal Injury Law Firm in Athens, GA</b></p>' +
                                    '</div>' +
                                    '</div>';
                                // Define the image to use for the map marker (58 x 44 px)
                                var image = 'images/marker.png';
                                // Define the Lattitude and Longitude for the map location
                                var myLatLng = new google.maps.LatLng(33.948006, -83.377319);
                                // Define the map marker characteristics
                                var mapMarker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                    icon: image,
                                    title: 'Frostbyte Interactive'
                                });
                                // Following Lines are needed if you use the Info Window to display content when map marker is clicked
                                var infowindow = new google.maps.InfoWindow({
                                    content: contentString
                                });
                                // Following line turns the marker, into a clickable button and when clicked, opens the info window
                                google.maps.event.addListener(mapMarker, 'click', function () {
                                    infowindow.open(map, mapMarker);
                                });
                            }
                        </script> -->
                        <!-- END GOOGLE MAP SCRIPT -->
                    </div>
                </div>
            </div>                    
        <?php endif; ?>                 




<?php

get_footer();
