<?php 

function registra_sidebar(){
	register_sidebar( array(
		'name' => 'Area barra lateral',
		'id' => 'barra-lateral',
		'description' => 'Insira os Widgets para aparecer na barra lateral',

	));
}
add_action( 'widgets_init', 'registra_sidebar' );


function registra_widget(){
	register_widget( 'Widget_Ultimos_Filmes' );
}
add_action( 'widgets_init', 'registra_widget' );


class Widget_Ultimos_Filmes extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'Widget_Ultimos_Filmes',
			'Ultimos Filmes',
			array( 'description' => 'Widget para exibir os ultimos filmes' )
		);
	}

	public function widget( $args, $instance ){
		$titulo = $instance["titulo"];
		$quantidade = $instance["quantidade"];
		echo "<p class='title-list-sidebar'>$titulo</p>";

		$args = array('post_type' => 'filmes', 
					  'posts_per_page' => $quantidade,
					  'orderby' => 'date', 
					  'order' => 'DESC');

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			echo '<ul>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li>';?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				<?php echo '</li>';
			}
			echo '</ul>';
		}
	}
	public function form( $instance ){
		$titulo = $instance["titulo"];
		$quantidade = $instance["quantidade"];
		echo "<br>";
		echo "Titulo: ";
		echo "<input type='text' id='".$this->get_field_id('titulo')."' name='".$this->get_field_name('titulo')."' value='$titulo'>";
		echo "<br><br>";
		echo "Quantidade a ser mostrada: ";
		echo "<input type='text' id='".$this->get_field_id('quantidade')."' name='".$this->get_field_name('quantidade')."' value='$quantidade'>";
		

	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance["titulo"] = $new_instance["titulo"];
		$instance["quantidade"] = $new_instance["quantidade"];
		return $instance;

	}
}


?>