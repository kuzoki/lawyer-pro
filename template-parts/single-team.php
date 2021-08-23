<?php 
    $attorneys_fields = get_field('attorney_setting');
    $global_info = $attorneys_fields['global_info']
?>
    <div class="hero hero-page" style="background: url(<?= get_field('background_image_hero_for_archive', 'option') ?>);">
        <div class="bg-layer"></div>
        <div class="container">
            <div class="hero-content">
                <p class="eyebrow">Team member</p>
                <h2 class="hero-title mt-3"><?= get_the_title()?></h2>
                
            </div>
        </div>
    </div>



<!-- Post Content -->
<div class="single--post sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 card-col">
                <?php if($attorneys_fields['about_page_image']): ?>
                    <img src="<?= esc_url($attorneys_fields['about_page_image']) ?>" alt="<?= esc_attr(the_title())?>" class="single-member-img">
                <?php else: ?> 
                    <img src="<?= esc_url(get_template_directory_uri()) ?>/assets/images/notfound.png" alt="Attorney">
                <?php endif ?>     
                <div class="warp">
                    <h2 class="name"><?php echo $global_info['first_name'].' '.$global_info['last_name'] ?></h2>
                    <p class="role body-text"><?php echo $global_info['specialty'] ?></p>
                    <div class="row links px-0">
                        <div class="col-sm-8 left">
                            <ul>
                                <?php if( $global_info['phone_number']): ?>
                                    <li><i class="fas fa-phone"></i><a href="tel:<?= esc_html($global_info['phone_number']) ?>"><?= esc_html($global_info['phone_number']) ?></a></li>
                                <?php endif; ?>
                                <?php if( $global_info['email']): ?>
                                    <li><i class="fas fa-envelope"></i><a href="mailto:<?= esc_attr($global_info['email']) ?>"><?= esc_html($global_info['email']) ?></a></li>
                                <?php endif; ?>
                                <?php if( $global_info['address']): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?= esc_html($global_info['address']) ?></li>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                        <div class="col-sm-4 right">
                            <!-- Social Media -->
                            <ul>
                                <?php $social_media = $global_info['social_media']; if( $social_media ): foreach( $social_media as $row ): ?> 
                                 <li><a href="<?= esc_url($row['link'])?>" target='_blank' ><?= $row['icon']?></a></li>
                                <?php  endforeach; endif;?>
                            </ul>
                            <!-- Pdf Link -->
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 text-col">
                <h3 class="sec-title">Biography & Experience</h3> 
                <!-- Field -->
                <div class="body-text">
                    <?php echo $attorneys_fields['description']?>
                </div>  
                
                <!-- Bar Admission Block -->
                <?php $bar_list = $attorneys_fields['bar_admission_list'];
                    if( $bar_list ): 
                ?>

                    <h4 class="in-title mt-5">Bar Admissions</h4>   
                    <div class='admission-list body-text'>
                        <ul class="ps-5">
                        <?php foreach( $bar_list as $row ): ?>
                            <li><?= $row['text'] ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div> 

                <?php  endif; ?>
               <!-- Education Path  Block -->             
                <?php $education_path = $attorneys_fields['education_path'];
                    if( $education_path ): 
                ?>

                    <h4 class="in-title mt-5">Education</h4>   
                    <div class='admission-list body-text'>
                        <ul class="ps-5">
                        <?php foreach( $education_path as $row ): ?>
                            <li><?= $row['text'] ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div> 

                <?php  endif; ?>
                <!-- Seen On Block -->  
                    <?php $appeared_on = $attorneys_fields['appeared_on'];
                        if( $appeared_on ): 
                    ?>       
                    <h4 class="in-title mt-5">As Seen On</h4>   
                    <div class='row'>
                        <?php foreach( $appeared_on as $row ): ?>
                        <div class="col-4 block-col">
                            <a href="<?= esc_url($row['link']) ?>" target="_blank" class="p-2 d-block seen-on">
                                <img src="<?= esc_url($row['logo']) ?>" alt="seen on">
                            </a>
                        </div>
                        <?php endforeach; ?>
                        
                        
                    </div> 
                    <?php  endif; ?>       

                <?php if($attorneys_fields['pdf_cv']): ?>
                    <a href="<?php echo esc_url($attorneys_fields['pdf_cv'])?>" class='cta-btn hollow-btn'> Download File <i class="far fa-file-pdf"></i></i></a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>


<?php get_template_part( 'template-parts/free_quot');?>   