<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flitwp 
 */

?>


    
</main>    
    <!-- FOOTER -->
    <footer>
        <div class="container group">
            <div class="row row d-flex align-items-start">
                
                
                    <div class="col-lg-3 col-12 px-sm-0 px-5">
                        <div class="brief">
                            <div class="logo">
                                <?php 
                                    
                                    if(get_field( "company_logo", "option" )):
                                ?> 
                                    <a href="/"><img src="<?php echo esc_url(get_field( "company_logo", "option" )); ?>" alt="logo"></a>
                                <?php 
                                    else: 
                                        if ( function_exists( 'the_custom_logo' ) ) {
                                            the_custom_logo();
                                        } 
                                    endif;
                                ?>		
                            </div>
                            <p class="body-text">
                                <?php if(get_field("company_small_description", "option")):
                                        echo get_field("company_small_description", "option");
                                    else:
                                        echo bloginfo( 'description' ); 
                                    endif;    
                                ?>   
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-6 text-center text-sm-start ">
                        <div class="item">
                           
                            <p class="title">Menu</p>
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer-menu-left',
                                        'menu_id'        => 'menu-footer-left',
                                        'menu_class'           => 'nav-items-footer',
                                    )
                                );
                                
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-6 text-center text-sm-start">
                        <div class="item">
                          
                            <p class="title">QUICK LINKS</p>
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer-menu-right',
                                        'menu_id'        => 'menu-footer-right',
                                        'menu_class'           => 'nav-items-footer',
                                    )
                                );
                                
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-12 text-center text-sm-start">
                        <div class="item">
                            <p class="title">HEADQUARTERS</p>
                            <p class="body-text">
                                <?php echo get_field('company_address' , 'option') ?>
                            </p>
                        </div>
                    </div>
                
            </div>
            <div class="row">
                <div class="lower-foot row d-flex flex-md-row flex-column   align-items-center">
                        <div class="col-md-4 col-12 ">
                            <div class="d-flex justify-content-md-start justify-content-center align-items-center">
                            
                                <!-- Repeater List -->
                                <?php 
                                    $social_media = get_field('social_media' , 'option');
                                    if( $social_media): 
                                        
                                        foreach( $social_media as $row ) :
                                            
                                            ?>
                                            <a href="<?php echo esc_url($row['social_link']);?>" target="_blank" rel="noopener noreferrer" class="social-normal">
                                                <?php echo $row['select_icon'];?>
                                            </a>
                                        <?php   
                                        endforeach;
                                        
                                    endif; 
                                    
                                ?>     
                            </div>
                        </div>          
                        
                    
                        <div class="col-md-4 col-12 my-md-0 my-3">
                            <p class="copyright text-center">© <?php echo date("Y");?> <?php 
                                if(get_field('company_name', 'option' )):
                                    echo get_field('company_name', 'option' );
                                else:
                                    bloginfo( 'name' ); 
                                endif;
                                ?>
                            , All Rights Reserved.</p>
                        </div>       
                        
                    
                        <div class="col-md-4 col-12">
                           
                                <?php 
                                    
                                    if(get_field( "trust_badge", "option" )):
                                ?> 
                                    <img src="<?php echo esc_url(get_field( "trust_badge", "option" )); ?>" alt="trust-logo" class="trust-logo">
                                <?php endif; ?>    
                            
                        </div>          
                        
                    
                </div>
            </div>
        </div>
    </footer>
    
  

<?php wp_footer(); ?>

</body>
</html>
