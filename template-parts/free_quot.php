
<?php
    $cta_button = get_field('contact_us_block_cta_button', 'option');
?>

<div class="container blue--block text-center my-5">
    
    <h3><?= get_field('contact_us_block_title_text', 'option')?></h3>
    <?php if($cta_button): ?>
    <a href="<?= $cta_button['url'] ?>" class="cta-btn round-btn-secondary "><?= $cta_button['title'] ?></a>
     <?php endif; ?>   
</div>