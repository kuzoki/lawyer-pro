 <!-- BLOG POSTS -->

        <div class="blog-sec sec group" id="blog-sec">
            <div class="container">
                <h3 class="sec-title center"><?= get_sub_field('title_text')?></h3>
                <div class="row">
                    <?php 

                        $num_per_page_post = -1;
                                
                        
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            
                        );
                        $blog = new WP_Query($args);

                        while ($blog->have_posts()) {
                        $blog->the_post();
                                        
                    ?>       
                    <div class="col-lg-4">
                        <div class="single-post">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="blog image" class='img-blog-home'>
                            </a>
                            <div class="category-link my-2"><?= the_category();?></div>
                            <a class="post-title mb-1" href="<?php the_permalink(); ?>" title="<?= get_the_title()?>"><?= wp_trim_words(get_the_title(),8,'..');?></a>
                            <div class="body-text date"><?php the_time('F j, Y');?> By <?= get_the_author() ?></div>
                        </div>
                    </div>
                    <?php 
                            }
                            wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
