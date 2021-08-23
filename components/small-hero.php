
<?php
    // Static Hero With Background
    $small_hero_page = get_sub_field('small_hero_page');
    $eyebrow = esc_html($small_hero_page['eyebrow_text']);
    $title = esc_html($small_hero_page['hero_title']);
    $background_image = $small_hero_page['background_image'];
    
   
?>

<div class="hero hero-page" style="background: url(<?= esc_url($background_image) ?>);">
    <div class="bg-layer"></div>
    <div class="container">
        <div class="hero-content">
                <p class="eyebrow"><?= $eyebrow ?></p>
                <h2 class="hero-title mt-3"><?php if($title): echo $title; else:  echo esc_html(get_the_title()); endif ?></h2>
                
        </div>
    </div>
</div>