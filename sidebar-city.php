

        <?php 
            $args = array(
                'author'         => $author,
                'category_name'  => 'talks',
                'posts_per_page' => 10,
            );

            $talks = new WP_Query($args);
        ?>

        <?php if ($talks->have_posts()) : ?>

        <h4>Recent Talks</h4>

        <div class="clearfix city-talks">

        <?php while ($talks->have_posts()) : $talks->the_post(); ?>

                <!-- Article -->
                <article class="post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <?php
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'm', true);
                        $thumb_url = $thumb_url_array[0];
                    ?>

                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="talk-thumb" style="background-image: url('<?php echo $thumb_url; ?>');"></div>
                    </a>

                    <h5 class="talk-title" itemprop="headline">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h5>

                </article>

        <?php endwhile; endif; ?>

        </div>

