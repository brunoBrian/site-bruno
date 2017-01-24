<?php 

function registra_sidebar_curta_facebook(){
	register_sidebar( array(
		'name' => 'Area barra lateral',
		'id' => 'barra-lateral',
		'description' => 'Insira os Widgets para aparecer na barra lateral',

	));
}
add_action( 'widgets_init', 'registra_sidebar_curta_facebook' );


function registra_widget_curta_facebook(){
	register_widget( 'registra_widget_curta_facebook' );
}
add_action( 'widgets_init', 'registra_widget_curta_facebook' );


class registra_widget_curta_facebook extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'registra_widget_curta_facebook',
			'Curta Facebook',
			array( 'description' => 'Widget para exibir caixa de curtir página no facebook' )
		);
	}

	public function widget( $args, $instance ){
		$url = $instance["url"];
		echo '<div class="widget-facebook">';
			echo "$url";
		echo "</div>";
		?>
		
		<?php 			
	}
	public function form( $instance ){
		$url = $instance["url"];
		echo "<br>";
		echo "Insira a Url da página com o iframe: ";
		echo "<input type='text' id='".$this->get_field_id('url')."' name='".$this->get_field_name('url')."' value='$url'>";
	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance["url"] = $new_instance["url"];
		return $instance;

	}
}


?>