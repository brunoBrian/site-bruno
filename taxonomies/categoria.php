<?php

function custom_taxonomy_categoria() {

  register_taxonomy(
        'categoria',
        array( 'filmes', 'series' ),
        array(
            'label' => __( 'Categoria' ),
            'labels' =>  array(
                'name'              => esc_html( 'Categoria', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Categoria', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Categorias' ),
                'all_items'         => esc_html( 'Todas Categorias' ),
                'edit_item'         => esc_html( 'Editar Categorias' ),
                'view_item'         => esc_html( 'Visualizar Categorias' ),
                'update_item'       => esc_html( 'Alterar Categorias' ),
                'add_new_item'      => esc_html( 'Adicionar Categoria' ),
                'search_items'      => esc_html( 'Procurar Categoria' ),
                'not_found'         => esc_html( 'Nenhuma Categoria encontrada' ),
                'add_or_remove_items'  => esc_html( 'Adicionar ou remover Categoria'),
                'choose_from_most_used'=> esc_html( 'Mais procurados'),
                'popular_items'        => esc_html( 'Populares'),
                'search_items'         => esc_html( 'Procurar Categoria' ),
                'not_found'            => esc_html( 'Não encontrado' ),
                'no_terms'             => esc_html( 'Nenhuma Categoria' ),
                'items_list'           => esc_html( 'Lista de Categorias' ),
                'items_list_navigation'=> esc_html( 'Lista de navegação'),
            ),
            'hierarchical'             => true,
            'public'                   => true,
            'show_ui'                  => true,
            'show_admin_column'        => true,
            'rewrite' => array( 
            'slug' => 'categoria', 
            'with_front' => true
            ),
          )
     );

}
add_action( 'init', 'custom_taxonomy_categoria', 0 );
/*
#======================================Adicionando campo UF na taxonomia
add_action('cachorro_add_form_fields', 'add_cachorro_fields', 10, 2 );
function add_cachorro_fields($taxonomy){
?>
  <div>
    <label for="uf">UF</label>
    <input type="text" name="uf" id="uf"><br><br>
  </div>
<?php
}

#=======================================Salvando a uf========================
add_action('created_cachorro', 'save_cachorro_meta', 10, 2);

function save_cachorro_meta($term_id, $tt_id){
  if(!empty($_POST['uf'])){
    //$uf = sanitize_text_field($_POST['uf']);
    add_term_meta($term_id, 'uf', $_POST['uf'], true);
  }
}

#===================================Habilitando edição na UF da taxonomia ====================
add_action('cachorro_edit_form_fields', 'edit_cachorro_fields', 10, 2);

function edit_cachorro_fields($term, $taxonomy){
  global $uf;
  $uf = get_term_meta($term->term_id, 'uf', true);
?>
  <tr class="form-field term-group-wrap">
    <th scope="row"><label for="uf">UF</label></th>
    <td>
      <div class="form-field term-group">
        <input type="text" name="uf" value="<?php echo $uf?>">
      </div>
    </td>
  </tr>


<?php
}


#===================================Salvando UF na taxonomia ====================
add_action('edited_cachorro', 'update_cachorro_meta', 10, 2);
function update_cachorro_meta($term_id, $tt_id){
  if(!empty($_POST['uf'])){
    update_term_meta($term_id, 'uf', $_POST['uf']);
  }
}
*/