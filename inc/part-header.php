<?php $runtext    = velocitytheme_option('info_header'); ?>
<div class="container px-2 py-1 bg-dark text-white">
    <div class="row m-0">
        <div class="col-md-9 p-0">
            <?php if ($runtext) : ?>
                <marquee scrollamount="3" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                    <div class="runtext"><span class="btn btn-sm bg-theme fw-bold text-white py-1 px-3">Info</span>
                        <span class="p-1"><?php echo  $runtext; ?></span>
                    </div>
                </marquee>
            <?php endif; ?>
        </div>
        <div class="col-md-3 p-0">
            <?php echo get_search_form(); ?>
            <div class="d-md-none d-block"><?php echo do_shortcode('[vd-search]'); ?></div>
        </div>
    </div>
</div>

<div class="container d-none d-md-block p-0">
    <div class="kontak-header text-end align-items-center p-1">
        <?php echo do_shortcode('[kontak style="false"]'); ?>
    </div>
</div>

<div class="container bg-white py-2 p-0">
    <div class="row m-0 align-items-center">
        <div class="col-sm-3 col-md-2 text-sm-start text-center">
            <button class="navbar-toggler bg-theme text-white py-2 px-3 rounded-0" onclick="openNav()" type="button" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg> Menu
            </button>
        </div>
        <div class="col-sm-6 col-md-8 p-2 text-center">
            <?php $sitelogo = velocitytheme_option('custom_logo'); ?>
            <div class="position-relative">
                <?php if ($sitelogo) : ?>
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo wp_get_attachment_image_url($sitelogo, 'full'); ?>" alt="Site Logo" loading="lazy">
                    </a>
                <?php endif;  ?>
            </div>
        </div>
        <div class="col-sm-3 col-md-2 profile-icons d-flex justify-content-md-end justify-content-center">
            <div class="px-1"><?php echo do_shortcode('[profile]'); ?></div>
            <div class="px-1"><?php echo do_shortcode('[cart]'); ?></div>
        </div>
    </div>
</div>

<div class="card rounded-0 p-2 border-0 container">
    <nav id="main-navi" class="m-md-0 my-2 p-0 border navbar navbar-expand-md d-block navbar-light bg-white p-0" aria-labelledby="main-nav-label">

        <div class="menu-header text-start d-md-none position-relative" data-bs-theme="dark">

            <button class="navbar-toggler p-0 m-2 rounded-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'justg'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-dark bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg> Menu
            </button>

        </div>

        <div class="menu-styles bg-white">
            <div class="pb-0">

                <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavOffcanvas">

                    <div class="offcanvas-header justify-content-end">
                        <button type="button" class="btn-close btn-close-dark text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div><!-- .offcancas-header -->

                    <!-- The WordPress Menu goes here -->
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary',
                            'container_class' => 'offcanvas-body',
                            'container_id'    => '',
                            'menu_class'      => 'navbar-nav navbar-light justify-content-md-start justify-content-start flex-md-wrap flex-grow-1',
                            'fallback_cb'     => '',
                            'menu_id'         => 'primary-menu',
                            'depth'           => 4,
                            'walker'          => new justg_WP_Bootstrap_Navwalker(),
                        )
                    ); ?>

                </div><!-- .offcanvas -->
            </div>

    </nav><!-- .site-navigation -->
</div>

<div class="card container p-0 rounded-0 border-0">
    <div class="haeder-images">
        <?php if (has_header_image()) {
            echo '<a href="' . get_home_url() . '">';
            echo '<img class="w-100" src="' . esc_url(get_header_image()) . '" />';
            echo '</a>';
        } ?>
    </div>
</div>

<!-- sidenavbar -->
<nav id="left-nav" class="sidenav bg-theme" aria-labelledby="main-nav-label">
    <div class="menu-styles p-2">
        <div class="offcanvas-header justify-content-end">
            <button class="btn-close" onclick="closeNav()" type="button" aria-label="Close"></button>
        </div>

        <div class="p-2"><?php echo do_shortcode('[vtoko-list-taxonomy]'); ?></div>
    </div>
</nav><!-- .site-navigation -->