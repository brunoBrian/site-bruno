<?php

	require_once('custom-post/filmes.php');
  require_once('widgets/ultimos-filmes/ultimos-filmes.php');
  require_once('widgets/listagem-categorias/listagem-categorias.php');
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


add_theme_support( 'post-thumbnails' );

function register_menu() {
	register_nav_menu( 'menu-principal', __( 'Menu Principal' ));
}

add_action('init', 'register_menu');




add_action( 'after_setup_theme', 'meu_tema_configuracoes' );
function meu_tema_configuracoes()
{
    add_image_size( 'thumbnail-single', 700, 500, true );
    add_image_size( 'thumbnail-list-taxonomy', 350, 250, true );
}

function wordpress_pagination() {
      global $wp_query;

      $big = 999999999;

      echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
      ) );
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

         