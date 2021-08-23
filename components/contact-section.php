
 <!-- CONTACT -->
 <?php 
    $bg_type = get_sub_field('background_type'); 
    $bg_img = get_sub_field('background_image');
    $bg_color = get_sub_field('background_color');
    $title_color = get_sub_field('title_color');
    if($bg_type == 'color'): $bg_contact = $bg_color; elseif($bg_type == 'image'): $bg_contact = 'url('.esc_url($bg_img).')'; endif;
 ?>

    <div class="contact-sec sec" style="background:<?= $bg_contact ?>">
        <?php if($bg_type == 'image'): ?><div class="bg-layer"></div> <?php endif ?>
        <div class="container">
            <h3 class="sec-title" style="<?php if($bg_type == 'color'): echo 'color:'.esc_attr($title_color).';'; endif; ?>"><?= esc_html(get_sub_field('text_title')) ?></h3>
            
                <div class='row px-0'>
                    <div class="col-lg-6 px-0">
                        <div class="forms-bg">
                            <p class="title"><?= get_sub_field('sub_text') ?></p>
                           
                            <?php $forms = get_sub_field('contact_form');
                            if( $forms ): 
                                foreach( $forms as $p ): 
                                    $cf7_id= $p->ID;
                                    echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                                endforeach;
                            endif; ?>
                        </div>
                    </div>
                    <!-- Global Options -->
                    <div class="col-lg-6 px-0 overflow-hidden">
                        <div class="info-group col-12">
                            <p class="info-title">Contact Us</p>
                            <div class="row">
                                <div class="col-6">
                                    <div class="info">
                                        <img src="<?= esc_url(get_field('address_icon' , 'option')) ?>" alt="contact icon">
                                        <a href="<?= esc_url(get_field('company_google_map_link' , 'option')) ?>"><?= esc_html(get_field('company_address' , 'option')) ?></a>
                                    </div>
                                    <div class="info">
                                        <img src="<?= esc_url(get_field('email_icon' , 'option')) ?>" alt="contact icon">
                                        <a href="mailto:<?= esc_attr(get_field('email_address' , 'option')) ?>"><?= esc_html(get_field('email_address' , 'option')) ?></a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="info">
                                        <img src="<?= esc_url(get_field('phone_number_icon' , 'option')) ?>" alt="contact icon">
                                        <div>
                                            <a href="tel:<?= esc_attr(get_field('main_phone_number' , 'option')) ?>"><?= esc_html(get_field('main_phone_number' , 'option')) ?></a> 
                                            </br>
                                            <a href="tel:<?= esc_attr(get_field('secondary_phone_number' , 'option')) ?>"><?= esc_html(get_field('secondary_phone_number' , 'option')) ?></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="google-map col-12">
                        <?= get_field('company_google_map' , 'option') ?>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>                    