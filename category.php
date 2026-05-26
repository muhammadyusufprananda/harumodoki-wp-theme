<?php get_header(); ?>
<div class="container">
    <div class="content">
        <div class="box">
            <div class="box-title">
                Kategori:
                <?php single_cat_title(); ?>
            </div>
            <div class="box-content">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="post-item">
                            <div class="post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="post-info">
                                <a href="<?php the_permalink(); ?>" class="post-title-link">
                                    <?php the_title(); ?>
                                </a>
                                <div class="post-meta">
                                    Diposting pada <?php the_time('F d, Y'); ?>
                                    <br>
                                    Proyek:
                                    <?php the_tags('', ', '); ?>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    <?php endwhile; ?>
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '« Previous',
                            'next_text' => 'Next »',
                        ));
                        ?>
                    </div>
                <?php else : ?>
                    Tidak ada hasil ditemukan.
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>