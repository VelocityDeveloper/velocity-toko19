<?php

/**
 * Template Name: Home Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package justg
 */
// phpinfo();
get_header();
$container         = velocitytheme_option('justg_container_type', 'container');
$sliders = velocitytheme_option('slider_repeat');
?>
<div class="wrapper m-0 p-0" id="page-wrapper">
    <div class="container p-0" id="content">
        <div class="row mx-auto">
            <main class="site-main" id="main" role="main">
                <div id="carouselExampleInterval" class="carousel slide border" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($sliders as $slider) : ?>
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img class="ratio ratio-16x9" src="<?php echo $slider['imgslider']; ?>" alt="...">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <div class="container p-0">
                    <div class="sambutan p-3">
                        <div class="text-center"><?php echo velocitytheme_option('sambutan_home'); ?></div>
                    </div>
                    <?php
                    $args = ['post_type' => 'vtoko-testimoni', 'post_status' => 'publish',];
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                        echo '<div class="testimoni-home p-3 text-white bg-dark">' . do_shortcode('[vtoko-carousel-testimoni]') . '</div>';
                        echo '<div class="my-2 text-center"><a class="btn btn-sm bg-theme text-white" href="' . velocitytheme_option('link_testi') . '">Semua Testimoni</a></div>';
                        wp_reset_query();
                    endif;
                    ?>
                </div>
        </div>

        <div class="container">
            <h3 class="title-single-part m-0"><?php echo get_option('blogname') . ' - ' . get_option('blogdescription'); ?></h3>
            <div class="produk-home mb-2">
                <?php
                $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                $argprod = array(
                    'posts_per_page' => 8,
                    'post_type' => 'product',
                    'paged' => $paged,
                );
                $produk_query = new WP_Query($argprod);

                if ($produk_query->have_posts()) :
                    echo '<div class="row m-0">';
                    while ($produk_query->have_posts()) {
                        $produk_query->the_post();
                        do_action('velocitytoko_product_loop');
                    }
                    echo '</div>';

                    // Fungsi pagination
                    echo '<div class="pagination pagi-home">';
                    echo paginate_links([
                        'total' => $produk_query->max_num_pages,
                        'current' => $paged,
                        'prev_text' => __('&laquo; Prev'),
                        'next_text' => __('Next &raquo;'),
                    ]);
                    echo '</div>';
                    wp_reset_query();
                endif;
                ?>
            </div>

            <!-- Artikel section -->
            <?php $args = array(
                'posts_per_page' => 3,
                'showposts' => 3,
                'post_type' => 'post',
                'cat' => velocitytheme_option('velocity_news'),
            );
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) : ?>
                <div class="blog-home my-2">
                    <?php if (!empty(velocitytheme_option('velocity_judul_news'))) { ?>
                        <h3 class="title-single-part mt-3"><?php echo velocitytheme_option('velocity_judul_news'); ?></h3>
                    <?php } ?>
                    <div class="row mx-0">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <article <?php post_class('col-md-6 p-1'); ?> id="post-<?php the_ID(); ?>">
                                <div class="row m-0 border p-2 rounded">
                                    <div class="col-md-3 p-md-2 p-0">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="ratio ratio-1x1">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail('full', array('class' => 'w-100 mb-2')); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-9 p-md-2 py-2 px-0">
                                        <div class="judul-posts h6 fw-bold"><a class="colortheme" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></div>
                                        <div class="content">
                                            <?php $content = get_the_content();
                                            $trimmed_content = wp_trim_words($content, 15);
                                            echo $trimmed_content; ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif;
            wp_reset_query(); ?>
        </div>
        </main><!-- #main -->
    </div>
</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
