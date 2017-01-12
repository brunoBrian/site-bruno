<?php

function custom_taxonomy_genero() {

  register_taxonomy(
        'generos',
        'filmes',
        array(
            'label' => __( 'Gênero' ),
            'labels' =>  array(
                'name'              => esc_html( 'Gênero', 'taxonomy general name' ),
                'singular_name'     => esc_html( 'Gênero', 'taxonomy singular name' ),
                'menu_name'         => esc_html( 'Gêneros' ),
                'all_items'         => esc_html( 'Todos Gêneros' ),
                'edit_item'         => esc_html( 'Editar Gêneros' ),
                'view_item'         => esc_html( 'Visualizar Gêneros' ),
                'update_item'       => esc_html( 'Alterar Gêneros' ),
                'add_new_item'      => esc_html( 'Adicionar Gêneros' ),
                'search_items'      => esc_html( 'Procurar Gêneros' ),
                'not_found'         => esc_html( 'Nenhum Gênero encontrado' ),
                'add_or_remove_items'  => esc_html( 'Adicionar ou remover Gêneros'),
                'choose_from_most_used'=> esc_html( 'Mais procurados'),
                'popular_items'        => esc_html( 'Populares'),
                'search_items'         => esc_html( 'Procurar Gêneros' ),
                'not_found'            => esc_html( 'Não encontrado' ),
                'no_terms'             => esc_html( 'Nenhum Gênero' ),
                'items_list'           => esc_html( 'Lista de Gêneros' ),
                'items_list_navigation'=> esc_html( 'Lista de navegação'),
            ),
            'hierarchical'             => true,
            'public'                   => true,
            'show_ui'                  => true,
            'show_admin_column'        => true,
            'rewrite' => array( 
            'slug' => 'genero', 
            'with_front' => true
            ),
          )
     );

}
add_action( 'init', 'custom_taxonomy_genero', 0 );
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