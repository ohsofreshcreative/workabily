<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


add_action('pre_get_posts', function ($q) {
  if (is_admin() || !$q->is_main_query()) {
    return;
  }
  if ($q->is_search()) {
    if (!empty($_GET['post_type']) && $_GET['post_type'] === 'produkty') {
      $q->set('post_type', 'produkty');
    }
  }
});

/*--- TINYMCE CUSTOM FORMATS ---*/

add_filter('tiny_mce_before_init', function ($settings) {
    $custom_formats = [
        ['title' => 'Duży tekst',    'inline' => 'span', 'classes' => 'fmt-large'],
        ['title' => 'Mały tekst',    'inline' => 'span', 'classes' => 'fmt-small'],
        ['title' => 'Wyróżnienie',   'inline' => 'span', 'classes' => 'fmt-accent'],
    ];
    $settings['style_formats'] = json_encode($custom_formats);

    $editor_css = \Illuminate\Support\Facades\Vite::asset('resources/css/editor.css');
    $settings['content_css'] = isset($settings['content_css'])
        ? $settings['content_css'] . ',' . $editor_css
        : $editor_css;

    return $settings;
});

add_filter('mce_buttons_2', function ($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
});


/*--- BREACRUMB SEPARATOR ---*/
add_filter( 'woocommerce_breadcrumb_defaults', function ( $defaults ) {
    // Opakowujemy separator w element <span> z własną klasą CSS.
    $defaults['delimiter'] = '<span class="__separator">•</span>';
    return $defaults;
} );



/**
 * Override WooCommerce Coming Soon template
 */
add_filter('woocommerce_coming_soon_template', function ($template) {
    $custom_template = get_theme_file_path('resources/views/patterns/coming-soon.php');
    
    if (file_exists($custom_template)) {
        return $custom_template;
    }
    
    return $template;
});