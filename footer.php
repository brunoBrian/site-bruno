<div class="diviCinza"></div>
<div class="diviPreta"></div>
<div class="footer">
	<div class="row footer-content">
		<div class="col-lg-4 col-md-4 col-xs-4 footer-items">
			<h5>Descubra</h5>
				<ul>
					<li><a href="#">Filmes</a></li>
					<li><a href="#">Desenhos</a></li>
					<li><a href="#">Séries</a></li>
				</ul>
		</div>
		<div class="col-lg-4 col-md-4 col-xs-4 footer-items">
			<h5>Sobre</h5>
		</div>
		<div class="col-lg-4 col-md-4 col-xs-4 footer-items">
			<h5>Social</h5>
			<ul>
				<li><a href="#">Facebook</a></li>
				<li><a href="#">Instagram</a></li>
				<li><a href="#">Twitter</a></li>
				<li><a href="#">Youtube</a></li>
			</ul>
		</div>
	</div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/search.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(function() {
      // aqui colocar o nome do seletor q vai usar
      // padrao brasileiro descomente a linha 14
        $("#datepicker").datepicker({ dateFormat: "dd-mm-yy" }).val()
        // padrao americano linha 16
        //$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
   });

 </script>

</body>
</html>
