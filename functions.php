<?php

	require_once('custom-post/filmes.php');
	require_once('taxonomies/categoria.php');

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
?>