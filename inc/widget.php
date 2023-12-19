<?php
//register widget
add_action('widgets_init', 'justg_widgets_init', 20);
if (!function_exists('justg_widgets_init')) {
    function justg_widgets_init()
    {
        // Register footer widget area
        register_sidebar(
            array(
                'name'          => __('Footer Widget Area 1', 'justg'),
                'id'            => 'footer-widget-1',
                'description'   => __('', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-3 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title"><span>',
                'after_title'   => '</span></h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget Area 2', 'justg'),
                'id'            => 'footer-widget-2',
                'description'   => __('', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-3 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title"><span>',
                'after_title'   => '</span></h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget Area 3', 'justg'),
                'id'            => 'footer-widget-3',
                'description'   => __('', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-3 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title"><span>',
                'after_title'   => '</span></h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => __('Footer Widget Area 4', 'justg'),
                'id'            => 'footer-widget-4',
                'description'   => __('', 'justg'),
                'before_widget' => '<aside id="%1$s" class="mb-3 widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h3 class="widget-title"><span>',
                'after_title'   => '</span></h3>',
            )
        );
    }
}
