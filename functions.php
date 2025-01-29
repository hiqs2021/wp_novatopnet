function load_custom_styles_scripts() {
  wp_enqueue_style('custom-style', get_template_directory_uri() . '/wp_novatopnet/css/style.css');
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/wp_novatopnet/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'load_custom_styles_scripts');
