<?php

// Register Custom Post Type
function custom_post_type_filmes() {

	$labels = array(
    'name' => _x( 'Filmes', 'filmes' ),
    'singular_name' => _x( 'Filme', 'filme' ),
    'add_new' => _x( 'Adicionar novo', 'filmes' ),
    'add_new_item' => __( 'Adicionar novo Filme' ),
    'edit_item' => __( 'Editar Filme' ),
    'new_item' => __( 'Novo Filme' ),
    'all_items' => __( 'Todos Filmes' ),
    'view_item' => __( 'Ver Filme' ),
    'search_items' => __( 'Busca de Filme' ),
    'not_found' =>  __( 'Nenhum Filme encontrado' ),
    'not_found_in_trash' => __( 'Filme não encontrado na lixeira' ),
    'parent_item_colon' => '',
    'menu_name' => 'Filmes'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'taxonomy' => 'categoria',
    'rewrite' => ['slug' => 'filmes'],
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 11,
    'show_in_rest' => true,
    'rest_base' => 'filme',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports' => array( 'title', 'thumbnail', 'editor', 'custom-fields' )
  );
  register_post_type( 'filmes', $args );
}
add_action( 'init', 'custom_post_type_filmes', 0 );



// CUSTOM FIELDS
add_action('custom_metadata_manager_init_metadata','cursos_init_custom_fields');
function cursos_init_custom_fields(){
  x_add_metadata_group('metadata_group','filmes',array(
    'label'=>'Dados do curso'
  ));
 x_add_metadata_field('Phone', 'filmes', array(
      'group' => 'metadata_group'
      , 'description' => '###-###-####'
      , 'label' => 'Phone'
      , 'display_column' => true
  ));
  x_add_metadata_field('Pager', 'filmes', array(
    'group' => 'metadata_group'
    , 'description' => '###-###-####'
    , 'label' => 'Pager'
    , 'display_column' => true
  ));
  x_add_metadata_field('Fax', 'filmes', array(
    'group' => 'metadata_group'
    , 'description' => '###-###-####'
    , 'label' => 'Fax'
    , 'display_column' => true
    
  ));
}



?>