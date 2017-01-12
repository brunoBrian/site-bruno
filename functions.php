<?php

	require_once('custom-post/filmes.php');




add_theme_support( 'post-thumbnails' );

function register_menu() {
	register_nav_menu( 'menu-principal', __( 'Menu Principal' ));
}

add_action('init', 'register_menu');




add_action( 'after_setup_theme', 'meu_tema_configuracoes' );
function meu_tema_configuracoes()
{
    add_image_size( 'thumbnail-single', 700, 500, true );
}
?>