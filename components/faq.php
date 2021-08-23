
<!-- FAQ -->
<?php 
    /**
     *  Frequently Asked Layout
     */
    $cta_button = get_sub_field('cta_button');      
?>
<div class="faq-sec sec group" style='background:url(<?= esc_url(the_sub_field('background_image')) ?>)'>
    <div class="container">
        <h3 class="sec-title center"><?= esc_html(the_sub_field('title_text')) ?></h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="questions-col">
                            <?php 

                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'order'   => 'ASC',
                                
                                );
                                
                                $faq = new WP_Query($args);

                                while ($faq->have_posts()) {
                                $faq->the_post();
                                $id_q = get_the_ID();  
                                $faq_fields = get_field('faq_setting');                 
                            ?>
                        

                                <div class="question" data-ques-nbr="<?= $id_q ?>">
                                    <p class="number" data-nbr="nbr<?= esc_attr( $faq->current_post + 01 );?>"><?php if($faq->current_post < 9){echo "0";}?><?= esc_attr( $faq->current_post + 01 );?></p>
                                    <p><?= esc_html($faq_fields['question']); ?></p>
                                </div>

                            <?php 
                                }
                                wp_reset_query();
                            ?>    
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="answers-col">
                        <?php 

                                $args = array(
                                    'post_type' => 'faq',
                                    'posts_per_page' => -1,
                                    'order'   => 'ASC',
                                );

                                $faq_ans = new WP_Query($args);

                                while ($faq_ans->have_posts()) {
                                $faq_ans->the_post();
                                $id_a = get_the_ID();  
                                $faq_fields = get_field('faq_setting');                
                        ?>
                            <div class="answer " id="answer-<?= esc_attr( $faq->current_post + 01 );?>" data-answer-nbr="<?= $id_a ?>">
                                <p class="body-text">
                                    <?= $faq_fields['answer']; ?>
                                </p>
                                
                            </div>

                        <?php 
                                }
                                wp_reset_query();

                                
                        ?>    
                                
                                
                        <div class="more-questions">
                            <p><?= the_sub_field('sub_text') ?></p>
                            <a href="<?= esc_url($cta_button['url']) ?>" class="cta-btn round-btn" target="<?= esc_attr($cta_button['target']) ?>"><?= esc_html($cta_button['title']) ?></a>
                                   
                        </div>
                                
                    </div>
                </div>
            </div>
    </div>
</div>
