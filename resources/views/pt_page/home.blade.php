<!DOCTYPE html>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>UPIITA Domotics</title>
	<meta name="author" content="David Pérez Espino | Erick Eduardo Soto Pérez" />
	<meta name="description" content=" "/>
	<meta name="keywords"  content="" />
	<meta name="Resource-type" content="Document" />


	<link rel="stylesheet" type="text/css" href="/plugins/fullPage/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="/css/examples.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
	
	<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<script src="/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/plugins/fullPage/jquery.fullPage.min.js"></script>
	<script type="text/javascript" src="/js/examples.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['#EFAE48', '#D54239', '#59031A', '#331F21'],
				anchors: ['Inicio', 'Proyecto', 'Contacto','MasInfo'],
				menu: '#menu',
				scrollingSpeed: 1000
			});

		});
	</script>

</head>
<body>	

	<ul id="menu">
		<li data-menuanchor="Inicio"><a href="#Inicio">Inicio</a></li>
		<li data-menuanchor="Proyecto"><a href="#Proyecto">Proyecto</a></li>
		<li data-menuanchor="Contacto"><a href="#Contacto">Contacto</a></li>
		<li data-menuanchor="MasInfo"><a href="#MasInfo">Más Info</a></li>
	</ul>

	<div id="fullpage">
		<div class="section " id="section0">
			<h1>Upiita Domotics</h1>
			<p>La Solución Domótica para Hoteles</p>
			<span>Nos enfocamos en mejorar la estancia de los huespedes en hoteles, creando agradables experiencias y haciendo que el huesped solo se preocupe por... ¡Disfrutar!</span>
		</div>
		<div class="section" id="section1">
		    <div class="slide">
		    	<div class="intro">
					<h1>Controla tu cuarto</h1>
					<p>Luces, Ventilación, Puertas. No te preocupes por salir de la cama para hacerlo o tener que estar si quiera dentro del hotel, puedes estar al tanto de tu cuarto pase lo que pase, ¡Desde tu celular!</p>
				</div>
			</div>
			<div class="slide">
		    	<div class="intro">
					<h1>Visita lo que quieras</h1>
					<p>A tus tiempos. No te quedes sin visitar un lugar en tus vacaciones o viajes de negocio. Te ayudamos a crear una agenda de sitios para ver.</p>
				</div>
			</div>
			<div class="slide">
		    	<div class="intro">
					<h1>Nos preocupamos en la administración</h1>
					<p>No olvidamos a los administrativos. Contamos con un sistema de administración que permite tener orden en el hotel. Desde ver el regitro de empleados hasta tener un análisis del consumo de energía de cada cuarto.</p>
				</div>
			</div>
		</div>
		<div class="section" id="section2">
			<div class="intro">
				<h2>Comunicate con nosotros</h2>
				<form action="/contacto/enviar"  method="post">
			        <fieldset>
			        	<div class="col col-12">
				            <label class="label"><i class="fa fa-user"></i> Nombre</label>
			                <label class="form-group"> 
		        		        <input type="text" class="form-control" name="nombre" id="nombre">
		    	            </label>
	    	            </div>

	    	            <div class="col col-12">
				            <label class="label"><i class="fa fa-envelope"></i> Correo</label>
			                <label class="form-group"> 
		        		        <input type="email" class="form-control" name="email" id="email">
		    	            </label>
	    	            </div>
	
						<div class="col col-12">
				            <label class="label"><i class="fa fa-tag"></i> Asunto</label>
			                <label class="form-group"> 
		        		        <input type="text" class="form-control" name="asunto" id="asunto">
		    	            </label>
	    	            </div>

						<div class="col col-12">
				            <label class="label"><i class="fa fa-comment"></i> Mensaje</label>
			                <label class="form-group"> 
		        		        <textarea rows="4" name="mensaje" id="mensaje"></textarea>
		    	            </label>
	    	            </div>

						<input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" /><br>
						
					</fieldset>
					
					<footer>
						<button type="submit" class="btn btn-default" >Enviar</button>
					</footer>

		        </form>
			</div>
		</div>
		<div class="section fp-auto-height" id="section3">
			<div class="intro">
				<h3>UPIITA Domotics</h3>
				<span>
					Es un proyecto realizado por estudiantes de Ingeniería en Telemática de la Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas del Instituto Politécnico Nacional en la CD de México. 
				</san>
			</div>
			
		</div>
	</div>

</body>
</html>
