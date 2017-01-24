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
add_action('custom_metadata_manager_init_metadata','filmes_init_custom_fields');
function filmes_init_custom_fields(){
  x_add_metadata_group('metadata_group','filmes',array(
    'label'=>'Dados do Filme'
  ));
 x_add_metadata_field('tempo', 'filmes', array(
      'group' => 'metadata_group',
       'label' => 'Tempo',
       'display_column' => true,
  ));
  x_add_metadata_field('ano_lancamento', 'filmes', array(
    'group' => 'metadata_group',
     //'field_type' => 'datepicker',
      'label' => 'Data de Lançamento'
  ));
  x_add_metadata_field('direcao', 'filmes', array(
    'group' => 'metadata_group'
    , 'label' => 'Direção'
    , 'display_column' => true
    
  ));
  x_add_metadata_field('pais_origem', 'filmes', array(
    'group' => 'metadata_group'
    , 'label' => 'País de Origem'
    , 'display_column' => true
    
  ));
  /* x_add_metadata_field( 'sponsor_image', 'filmes', array(
      'group' => 'metadata_group',
      'field_type' => 'upload',
      'readonly' => true,
      'label' => 'Upload field',
    ) );*/
  x_add_metadata_field('atores', 'filmes', array(
    'group' => 'metadata_group'
    , 'label' => 'Atores'
    , 'display_column' => true
    
  ));
  x_add_metadata_field('classificacao_etaria', 'filmes', array(
    'group' => 'metadata_group'
    , 'label' => 'Classificação Etária'
    , 'display_column' => true,
    'field_type' => 'select',
      'values' => array(     // set possible value/options
        'option1' => 'Livre', // key => value pair (key is stored in DB)
        'option2' => 'Não recomendado para menores de 10 anos ',
        'option3' => 'Não recomendado para menores de 12 anos',
        'option4' => 'Não recomendado para menores de 14 anos',
        'option5' => 'Não recomendado para menores de 16 anos',
        'option6' => 'Não recomendado para menores de 18 anos',
        'option7' => 'Especialmente recomendado para crianças e adolescentes',
      ),
    
  ));
  x_add_metadata_field('idioma', 'filmes', array(
    'group' => 'metadata_group',
    'label' => 'Idiomas',
    'field_type' => 'radio',
    'display_column' => true,
    'values' => array(
        'Portugues' => 'Português',
        'Ingles' => 'Inglês',
        'Italiano' => 'Italiano',
        'Frances' => 'Francês',
        'Japones' => 'Japones',
      ),
    
  ));
  x_add_metadata_field('legendas', 'filmes', array(
    'group' => 'metadata_group',
    'label' => 'Legendas',
    'field_type' => 'select',
    'display_column' => true,
    'values' => array(
        'Portugues' => 'Português',
        'Ingles' => 'Inglês',
        'Italiano' => 'Italiano',
        'Frances' => 'Francês',
        'Japones' => 'Japones',
      ),
  ));
}

function add_custom_metabox_filmes(){
    add_meta_box(
      'wp_meta_id',
      'Descrição',
      'add_fields_filmes',
      'filmes',
      'normal'
    );
  }


  add_action('add_meta_boxes', 'add_custom_metabox_filmes');

  //Função para colocar o conteúdo dentro do box
  function add_fields_filmes(){
    
      global $post;
      $duracao = get_post_meta( $post->ID, 'duracao',true );
      $atores = get_post_meta( $post->ID, 'atores',true );
      $oscar = get_post_meta( $post->ID, 'oscar',true );
      $lancamento = get_post_meta( $post->ID, 'lancamento',true );
      $direcao = get_post_meta( $post->ID, 'direcao',true );


      
    ?>
      
    <label for="nascimento">Data de nascimento:</label>
    <input id="campododani" size="30" placeholder="dd-mm-aaaa" class="hasDatepicker">    
    <button type="submit">ENVIAR</button>
  
    <?php
  }



?>