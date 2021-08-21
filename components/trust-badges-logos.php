<?php
    // Static Hero With Background
    $title = get_sub_field('title');
    $logos = get_sub_field('logos');
   
    
   
?>

<div class="trusted-sec s-sec" id="trusted-sec">
    <div class="container">
    
                
        <div class="row">
            <div class="col-lg-4">
                <div class="title-part">
                    <p><?= $title ?></p>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="trust-badges">
                    <div class="row">
                        <?php 
                            
                            if( $logos ):
                            
                                foreach( $logos as $image ):
                        ?>           
                             <div class="col-lg-4 mb-1"> <img src="<?= $image['image'] ?>" alt="badge">  </div>
                                
                        <?php      
                                endforeach;
                            
                            endif;
                        ?>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>