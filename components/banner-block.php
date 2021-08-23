
<?php 

    /**
     * Banner Block Layout
     */
    $cta_button = get_sub_field('cta_button');

?>

<div class="container blue--block text-center my-5">
    
        <h3><?= esc_html(get_sub_field('title_text'))?></h3>
        <?php if($cta_button): ?>
        <a href="<?= esc_url($cta_button['url']) ?>" class="cta-btn round-btn-secondary "><?= esc_html($cta_button['title']) ?></a>
         <?php endif; ?>   
</div>