<?php

	require_once('custom-post/filmes.php');
  require_once('custom-post/series.php');
  require_once('widgets/ultimos-filmes/ultimos-filmes.php');
  require_once('widgets/listagem-categorias/listagem-categorias.php');
  require_once('widgets/mais-vistos/mais-vistos.php');
  require_once('widgets/series-mais-vistas/series-mais-vistas.php');
	require_once('taxonomies/categoria.php');
  


function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// Retorna outras categorias excepto a atual (redundante)
function cats_meow($glue) {
 $current_cat = single_cat_title( '', false );
 $separator = "\n";
 $cats = explode( $separator, get_the_category_list($separator) );
 foreach ( $cats as $i => $str ) {
  if ( strstr( $str, ">$current_cat<" ) ) {
   unset($cats[$i]);
   break;
  }
 }
 if ( empty($cats) )
  return false;
 
 return trim(join( $glue, $cats ));
} // end cats_meow

//habilitando imagem de destaque
add_theme_support( 'post-thumbnails' );


//Registrando Menu
function register_menu() {
	register_nav_menu( 'menu-principal', __( 'Menu Principal' ));
}
add_action('init', 'register_menu');

//Definindo tamanho das thumbnails
add_action( 'after_setup_theme', 'meu_tema_configuracoes' );
function meu_tema_configuracoes()
{
    add_image_size( 'thumbnail-single', 700, 500, true );
    add_image_size( 'thumbnail-list-taxonomy', 350, 250, true );
}

// Pagination
function wp_pagination($pages = '', $range = 9)
{  
    global $wp_query, $wp_rewrite;  
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;  
    $pagination = array(  
        'base' => @add_query_arg('page','%#%'),  
        'format' => '',  
        'total' => $wp_query->max_num_pages,  
        'current' => $current,  
        'show_all' => true,  
        'type' => 'plain'  
    );  
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );  
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );  
    echo '<div class="wp_pagination">'.paginate_links( $pagination ).'</div>';
}


/*Search Pagination*/
function tornese_search_page( $query, $paged ) {
    $args_search = array(
      's' => $_POST["search"],
      'posts_per_page' => 5,
      'paged' => $_POST["paged"]
    );
    if( $_POST["posttype"] ){
      $args_search["post_type"] = $_POST["posttype"];
    }
    $query_search = new WP_Query( $args_search );
    $results = '';
    if ( $query_search->have_posts() ) :
      while ( $query_search->have_posts() ) : $query_search->the_post();
        $results .= '<div class="result-item">';
          $results .= '<article id="post-'.get_the_ID().'">';
            $results .= '<div class="image">';
              $results .= '<div class="thumbnail animation-2">';
                $results .= '<a href="' .get_the_permalink().'">'.get_the_post_thumbnail().'</a>';
              $results .= '</div>';
            $results .= '</div>';
            $results .= '<div class="details">';
              $results .= '<div class="title">';


                $results .= '<h4>';
                $results .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                $results .= '</h4>';


              $results .= '</div>';
            $results .= '<div class="conteudo">';
              $results .= '<p>'.get_the_excerpt().'</p>';
            $results .= '</div>';
          $results .= '</div>';
        $results .='</article>';
      $results .= '</div>';  
      endwhile;
    endif;
  echo $results;
}
add_action( 'wp_ajax_tornese_search', 'tornese_search_page' );
add_action( 'wp_ajax_nopriv_tornese_search', 'tornese_search_page' );


//Os mais vistos - widget
if ( ! function_exists( 'tp_count_post_views' ) ) {// Verifica se não existe nenhuma função com o nome tp_count_post_views
    // Conta os views do post
    function tp_count_post_views () { 
        // Garante que vamos tratar apenas de posts
        
            // Precisamos da variável $post global para obter o ID do post
            global $post;
            
            // Se a sessão daquele posts não estiver vazia
            if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {
                
                // Cria a sessão do posts
                $_SESSION[ 'tp_post_counter_' . $post->ID ] = true;
            
                // Cria ou obtém o valor da chave para contarmos
                $key = 'tp_post_counter';
                $key_value = get_post_meta( $post->ID, $key, true );
                
                // Se a chave estiver vazia, valor será 1
                if ( empty( $key_value ) ) { // Verifica o valor
                    $key_value = 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } else {
                    // Caso contrário, o valor atual + 1
                    $key_value += 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } // Verifica o valor
                
            } // Checa a sessão
            
        
        return;
        
    }
    add_action( 'get_header', 'tp_count_post_views' );
}