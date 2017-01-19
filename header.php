<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/search.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/pagination-index.js"></script>

	<?php wp_head(); ?>
</head>

<body class="customize-support">
<div class="header">
		<div class="col-md-6 col-md-offset-3">
			<a href="<?php echo get_bloginfo('home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="img-logo"></a>
		</div>
</div>
<nav class="navbar navbar-default menu-principal">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php 
      wp_nav_menu( array( 
      	'theme_location' => 'menu-principal', 
      	'menu_class' => 'nav navbar-nav' 
      	) 
      ); 
      ?>
      <form action="<?php echo get_home_url(); ?>/" class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" name= "s" class="form-control" placeholder="Insira...">
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
