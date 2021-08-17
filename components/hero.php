

<?php
    // Static Hero With Background
    $big_hero_page = get_sub_field('big_hero_page');
    $eyebrow = $big_hero_page['eyebrow_text'];
    $title = $big_hero_page['hero_title'];
    $tagline_text = $big_hero_page['tagline_text'];
    $background_image = $big_hero_page['background_image'];
    $cta_hero = $big_hero_page['cta'];
   
?>

<div class="hero position-relative" style="background-image: url(<?= $background_image ?>);">
    
    <div class="container">
        <div class="hero-content">
            <p class="eyebrow"><?= $eyebrow; ?></p>
            <h2 class="hero-title my-3"><?= $title ?></h2>
            <p class="hero-title-underline">
                <?= $tagline_text ?>
            </p>
            <?php 
                if ($cta_hero): ?>
                <a href="<?php echo $cta_hero['url']; ?>" class="cta-btn big-hero-btn" target="<?php echo $cta_hero['target']; ?>"><?php echo $cta_hero['title']; ?><i class="fas fa-chevron-right"></i></a>
            <?php endif; ?>
                       
						
        </div>
    </div>
</div>
