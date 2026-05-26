<?php get_header(); ?>

<div class="container">

    <div class="content">

        <div class="box">

            <div class="box-content">

                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <h1 class="post-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="post-meta">
                        Diposting pada <?php the_time('F d, Y'); ?>
                    </div>

                    <?php if(has_post_thumbnail()) : ?>

                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>

                    <?php endif; ?>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="post-tags">
                        <?php the_tags('Project: ', ', '); ?>
                    </div>

                <?php endwhile; endif; ?>

            </div>

        </div>

    </div>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>