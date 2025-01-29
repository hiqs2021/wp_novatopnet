/**
* novatopnet Galeria 2025
*Instruções para Adicionar ao WordPress
*Adicionar HTML Dinâmico:
*Abra o arquivo de template do seu tema onde deseja incluir a galeria (por exemplo, index.php).
*Insira o código PHP e HTML da galeria na posição desejada.
*Adicionar CSS e JavaScript:
*No painel do WordPress, vá até “Aparência” > “Editor de Tema”.
*Abra o arquivo functions.php do seu tema e adicione o seguinte código para carregar o CSS e o JavaScript
*/

function load_custom_styles_scripts() {
  wp_enqueue_style('custom-style', get_template_directory_uri() . '/wp_novatopnet/css/style.css');
  wp_enqueue_script('custom-script', get_template_directory_uri() . '/wp_novatopnet/js/script.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'load_custom_styles_scripts');
