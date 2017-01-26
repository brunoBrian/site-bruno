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
        $quantidade = $instance["quantidade"];
        $nova_consulta = new WP_Query( 
            array(
                'post_type'           => 'series',
                'posts_per_page'      => $quantidade,                 // Máximo de 5 artigos
                'no_found_rows'       => true,              // Não conta linhas
                'post_status'         => 'publish',         // Somente posts publicados
                'ignore_sticky_posts' => true,              // Ignora posts fixos
                'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta 
                'meta_key'            => 'tp_post_counter',           
                'v_sortby' => 'views',  // Organiza os posts por visitas
            )
        );
        echo '<div class="scrool-widget">';
        echo "<p class='title-list-sidebar'>$titulo</p>";?>
            <?php if ( $nova_consulta->have_posts() ): 
                echo '<ul>';
                while ( $nova_consulta->have_posts() ): $nova_consulta->the_post(); ?>
                    <a href='<?php the_permalink(); ?>' title="<?php the_title(); ?>">
                         <li class="itens-widgets"> <span class="glyphicon glyphicon glyphicon-eye-open aria-hidden="true"></span><?php the_title(); ?></li>
                    </a>   
                    <?php echo $tp_post_counter; ?>               
               <?php endwhile;
                echo '</ul>';
        echo "</div>";?> 
            <?php endif; // have_posts ?>
            <?php wp_reset_postdata(); ?>
    <?php        
    }


    public function form( $instance ){
        $titulo = $instance["titulo"];
        $quantidade = $instance["quantidade"];

        echo "<br>";
        echo "Titulo: <br>";
        echo "<input type='text' id='".$this->get_field_id('titulo')."' name='".$this->get_field_name('titulo')."' value='$titulo'>";
        echo "<br><br>";
        echo "Quantidade a ser mostrada: <br>";
        echo "<input type='text' id='".$this->get_field_id('quantidade')."' name='".$this->get_field_name('quantidade')."' value='$quantidade'>";
    }

    public function update( $new_instance, $old_instance ){
        $instance = array();
        $instance["titulo"] = $new_instance["titulo"];
        $instance["quantidade"] = $new_instance["quantidade"];
        return $instance;

    }
}
 








