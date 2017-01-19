<?php 

function registra_sidebar_categoria(){
	register_sidebar( array(
		'name' => 'Area barra lateral',
		'id' => 'barra-lateral',
		'description' => 'Insira os Widgets para aparecer na barra lateral',

	));
}
add_action( 'widgets_init', 'registra_sidebar_categoria' );


function registra_widget_categoria(){
	register_widget( 'Widget_Lista_Categorias' );
}
add_action( 'widgets_init', 'registra_widget_categoria' );


class Widget_Lista_Categorias extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'Widget_Lista_Categorias',
			'Categorias',
			array( 'description' => 'Widget para exibir das categorias dos filmes' )
		);
	}

	public function widget( $args, $instance ){
		$titulo = $instance["titulo"];
		
		echo "<p class='title-list-sidebar'>$titulo</p>";

		$terms = get_terms(array(
			'taxonomy' => 'categoria',
			'hide-empty' => false,
		));
		echo '<ul>';
		foreach ($terms as $term) {
			echo '<li><a href='.get_term_link($term->term_id, "categoria").' >' . $term->name . '</a></li>';
		}
		echo '</ul>';
			
	}
	public function form( $instance ){
		$titulo = $instance["titulo"];


		echo "<br>";
		echo "Titulo: ";
		echo "<input type='text' id='".$this->get_field_id('titulo')."' name='".$this->get_field_name('titulo')."' value='$titulo'>";
	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance["titulo"] = $new_instance["titulo"];
		return $instance;

	}
}


?>