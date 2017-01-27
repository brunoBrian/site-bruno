<?php 

function registra_slides(){
	register_sidebar( array(
		'name' => 'Area Menu',
		'id' => 'area-menu',
		'description' => 'Insira os Widgets para aparecer na barra lateral',

	));
}
add_action( 'widgets_init', 'registra_slides' );


function registra_widget_slides(){
	register_widget( 'Widget_Slides' );
}
add_action( 'widgets_init', 'registra_widget_slides' );


class Widget_Slides extends WP_Widget {

	function __construct() {
		parent:: __construct(
			'Widget_Slides',
			'Slide para ficar no menu',
			array( 'description' => 'Widget para exibir slides na home' )
		);
	}

	public function widget( $args, $instance ){
		$url_img1 = $instance["img1"];
		$url_img2= $instance["img2"];
		$url_img3 = $instance["img3"];
		$url_img4 = $instance["img4"];


		if(is_home()) :?>
			<!-- Slides -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img class="img-carrousel" src="<?php echo $url_img1; ?>">
			      <div class="carousel-caption">
			        <h3>Chania</h3>
			        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
			      </div>
			    </div>
	
			    <div class="item">
			      <img class="img-carrousel" src="<?php echo $url_img2; ?>" alt="Chania">
			      <div class="carousel-caption">
			        <h3>Chania</h3>
			        <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
			      </div>
			    </div>

			    <div class="item">
			      <img class="img-carrousel" src="<?php echo $url_img3;?>" alt="Flower">
			      <div class="carousel-caption">
			        <h3>Flowers</h3>
			        <p>Beatiful flowers in Kolymbari, Crete.</p>
			      </div>
			    </div>

			    <div class="item">
			      <img class="img-carrousel" src="<?php echo $url_img4;?>" alt="Flower">
			      <div class="carousel-caption">
			        <h3>Flowers</h3>
			        <p>Beatiful flowers in Kolymbari, Crete.</p>
			      </div>
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
	<?php endif;
			
	}
	public function form( $instance ){
		$img1 = $instance["img1"];
		$img2 = $instance["img2"];
		$img3 = $instance["img3"];
		$img4 = $instance["img4"];

		echo "<br>";
		echo "URL imagem 1: ";
		echo "<input type='text' id='".$this->get_field_id('img1')."' name='".$this->get_field_name('img1')."' value='$img1'>";
		echo "<br>";
		echo "URL imagem 2: ";
		echo "<input type='text' id='".$this->get_field_id('img2')."' name='".$this->get_field_name('img2')."' value='$img2'>";
		echo "<br>";
		echo "URL imagem 3: ";
		echo "<input type='text' id='".$this->get_field_id('img3')."' name='".$this->get_field_name('img3')."' value='$img3'>";
		echo "<br>";
		echo "URL imagem 4: ";
		echo "<input type='text' id='".$this->get_field_id('img4')."' name='".$this->get_field_name('img4')."' value='$img4'>";
	}

	public function update( $new_instance, $old_instance ){
		$instance = array();
		$instance["img1"] = $new_instance["img1"];
		$instance["img2"] = $new_instance["img2"];
		$instance["img3"] = $new_instance["img3"];
		$instance["img4"] = $new_instance["img4"];
		return $instance;

	}
		
}


?>