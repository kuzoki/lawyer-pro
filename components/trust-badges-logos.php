<?php
    // Static Hero With Background
    $title = get_sub_field('title');
    $logos = get_sub_field('logos');
   
    
   
?>

<div class="trusted-sec s-sec" id="trusted-sec">
    <div class="container">
    
                
        <div class="title-part">
            <p><?= $title ?></p>
        </div>
        <div class="trust-badges group">
        <?php 
            
            if( $logos ):
               
                foreach( $logos as $image ):
        ?>           
                <img src="<?= $image['image'] ?>" alt="badge">  
                
        <?php      
                endforeach;
               
            endif;
        ?>          
               
        </div>
    </div>
</div>