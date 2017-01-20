<?php

function registra_sidebar_series_mais_vistas(){
    register_sidebar( array(
        'name' => 'Area barra lateral',
        'id' => 'barra-lateral',
        'description' => 'Insira os Widgets para aparecer na barra lateral',

    ));
}
add_action( 'widgets_init', 'registra_sidebar_series_mais_vistas' );


function registra_widget_series_mais_vistas(){
    register_widget( 'registra_widget_series_mais_vistas' );
}
add_action( 'widgets_init', 'registra_widget_series_mais_vistas' );


class registra_widget_series_mais_vistas extends WP_Widget {

    function __construct() {
        parent:: __construct(
            'registra_widget_series_mais_vistas',
            'Séries Mais Vistas',
            array( 'description' => 'Widget para exibir as séries mais vistas' )
        );
    }

    public function widget( $args, $instance ){
        $titulo = $instance["titulo"];
        $nova_consulta = new WP_Query( 
            array(
                'post_type'           => 'series',
                'posts_per_page'      => 5,                 // Máximo de 5 artigos
                'no_found_rows'       => true,              // Não conta linhas
                'post_status'         => 'publish',         // Somente posts publicados
                'ignore_sticky_posts' => true,              // Ignora posts fixos
                'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
                'meta_key'            => 'tp_post_counter', // A nossa post meta            
               'v_sortby' => 'views',  // Organiza os posts por visitas
            )
        );
        
        echo "<p class='title-list-sidebar'>$titulo</p>";?>
            <?php if ( $nova_consulta->have_posts() ): 
                echo '<ul>';
                while ( $nova_consulta->have_posts() ): ?>
                    <?php $nova_consulta->the_post(); ?>
                    <?php $tp_post_counter = get_post_meta( $post->ID, 'tp_post_counter', true );
                    echo '<li>';?>
                            <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
              <?php echo '</li>';                   
                endwhile;
                echo '</ul>';?> 
            <?php endif; // have_posts ?>
            <?php wp_reset_postdata(); ?>
    <?php        
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
 








