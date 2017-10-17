
<section id="favoritos" class="center-content">
    <div class="container">
        <div class="row">
            <div class="works_content text-center">
            	<h1>Aquí podrás buscar todo dentro de tus favoritos!</h1>
               <form action="consulta_favoritas.php" class="subcribe_form center-content" method="post">
			      <input type="text" name="usuario" placeholder="Buscar">
			      <input type="submit" value="buscar">
			    </form>
            </div>
        </div>
    </div>
</section>

<section id="agregar" class="center-content">
    <div class="container">
        <div class="row">
            <div class="works_content text-center">
            	<h1>Aquí podrás buscar todo dentro de tus favoritos!</h1>
            	<p>Agrega tu artista o Banda favorita!:</p>
               <form action="agregar_favorito.php" class="subcribe_form center-content" method="post">
			      <form action="agregar_favorito.php" method="post">
					  <input type="text" name="Banda" placeholder="Banda">
					  <input type="submit" value="buscar">
			    </form>
            </div>
        </div>
    </div>
</section>

<section id="buscar_banda">
	<div class="container">
		<div class="row">
			<div class="main_description_second_contant">
				<div class="col-md-6 col-sm-6 wow fadeIn" data-wow-duration="1.5s">
					<div class="second_heading_text top-margin">
						<h1>Buscar Bandas</h1>
						<p>Aquí podrás encontrar a todas las bandas que quieras :)</p>
					</div>

					<p>Aquí podrás encontrar todo lo que buscas!</p>
					<p>Por favor, ingresa la banda:</p>
				    <form action="consulta_busqueda_bandas.php" class="subcribe_form center-content" method="post">
				      <input type="text" name="nombre" placeholder="Nombre Banda a Buscar">
				      <input type="submit" value="buscar">
				    </form>

				</div>
			</div>
		</div>
	</div>
</section>

<section id="genero">
    <div class="container">
        <div class="row">
            <div class="pricing_heading_text center-content">
                <h1>Búsqueda por Género Musical</h1>
                <p>Ingresa el género musical a buscar:</p>
            </div>

            <form action="consulta_genero.php" class="subcribe_form center-content" method="post">
		      <input type="text" name="Genero" placeholder="Género">
		      <input type="submit" value="buscar">
		    </form>
        </div>
    </div>
</section>

<section id="discos">
    <div class="container">
        <div class="row">
            <div class="download_heading_text center-content">
                <h1>Búsqueda por Discos</h1>
                <p>Ingresa el disco a buscar:</p>
            </div>
            <form action="consulta_disco.php" class="subcribe_form center-content" method="post" >
		      <input type="text" name="Disco" placeholder="Disco">
		      <input type="submit" value="buscar">
		    </form>
        </div>
    </div>
</section>


<footer id="footer" class="center-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="copyright_text">
                    <p class=" wow zoomIn" data-wow-duration="1s">Made with <i class="fa fa-heart"></i> by <a href="http://bootstrapthemes.co">Bootstrap Themes</a>2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery/jquery.js"></script>

<script src="js/script.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/fancybox/jquery.fancybox.pack.js"></script>
<script src="js/nivo-lightbox/nivo-lightbox.min.js"></script>
<script src="js/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL6gbhsnCEt4FS9D6BBl3mZO1xy-NcwpE&sensor=false"></script>
<script src="js/jquery-easing/jquery.easing.1.3.js"></script>
<script src="js/superslide/jquery.superslides.js"></script>
<script src="js/wow/wow.min.js"></script>


</body>
</html>