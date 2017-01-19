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
    'taxonomies' => 'genero',
    'rewrite' => ['slug' => 'filme'],
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


/*
// CUSTOM FIELDS
add_action('custom_metadata_manager_init_metadata','cursos_init_custom_fields');
function cursos_init_custom_fields(){
  x_add_metadata_group('metadata_group','filmes',array(
    'label'=>'Dados do curso'
  ));
  x_add_metadata_field( 'nome', 'filmes' ,array(
  	'label'=>'Dados do curso'
  ));
}
*/

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
  /*function add_fields_filmes(){
    
  		global $post;
    	$duracao = get_post_meta( $post->ID, 'duracao',true );
    	$atores = get_post_meta( $post->ID, 'atores',true );
    	$oscar = get_post_meta( $post->ID, 'oscar',true );
    	$lancamento = get_post_meta( $post->ID, 'lancamento',true );
    	$direcao = get_post_meta( $post->ID, 'direcao',true );

    ?>
      <div>
        <div class="meta-row">
          <div class="meta-th">
            <label for="" class="wp_row_title" style="font-weight:bold;">Duração</label><br>
            <input type="text" style="width: 64%;" name="duracao" value="<?php echo $duracao ?>">
          </div><br>
          <div class="meta-th">
            <label for="" class="wp_row_title" style="font-weight:bold;">Atores</label><br>
            <input type="text" style="width: 64%;" name="atores" value="<?php echo $atores ?>">
          </div><br>
          <div class="meta-th">
            <label for="" class="wp_row_title" style="font-weight:bold;">Oscar?</label><br>
            <input type="text" style="width: 64%;" name="oscar" value="<?php echo $oscar ?>">
          </div>
           <div class="meta-th">
            <label for="" class="wp_row_title" style="font-weight:bold;">Direção</label><br>
            <input type="text" style="width: 64%;" name="direcao" value="<?php echo $direcao ?>">
          </div>
           <div class="meta-th">
            <label for="" class="wp_row_title" style="font-weight:bold;">Ano de Lançamento</label><br>
            <input type="text" style="width: 64%;" name="lancamento" value="<?php echo $lancamento ?>">
          </div>
        </div>
      </div>
    <?php
  }

  function adicionar_campos(){
  	global $post;
  	update_post_meta($post->ID, 'duracao', $_POST['duracao']);
  	update_post_meta($post->ID, 'atores', $_POST['atores']);
  	update_post_meta($post->ID, 'oscar', $_POST['oscar']);
  	update_post_meta($post->ID, 'lancamento', $_POST['lancamento']);
  	update_post_meta($post->ID, 'direcao', $_POST['direcao']);
  }

  add_action('save_post', 'adicionar_campos');
*/
?>