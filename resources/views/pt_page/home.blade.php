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
	
	<style>

		/* Sections
		 * --------------------------------------- */
		#section0 img,
		#section1 img{
			margin: 20px 0 0 0;
		}
		#section2 img{
			margin: 20px 0 0 52px;
		}
		#section3 img{
			bottom: 0px;
			position: absolute;
			margin-left: -420px;
		}
		.intro p{
			width: 50%;
			margin: 0 auto;
			font-size: 1.5em;
		}
		.twitter-share-button{
			position: absolute;
			z-index: 99;
			right: 149px;
			top: 9px;
		}

	</style>

	<script src="/plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<script src="/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/plugins/fullPage/jquery.fullPage.min.js"></script>
	<script type="text/javascript" src="/js/examples.js"></script>

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
				<p>Comunicate con nosotros</p>
				HACER UN FORMULARIO DE CONTACTO
			</div>
		</div>
		<div class="section fp-auto-height" id="section3">
			<div class="intro">
				<h1>Working On Tablets</h1>
				<p>
					Designed to fit to different screen sizes as well as tablet and mobile devices.
				</p>
			</div>
			
		</div>
	</div>

</body>
</html>
