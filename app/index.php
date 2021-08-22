<?php
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="keywords" content="analytical, analyticalcore, chemistry"/>
	<meta name="author" content="ACXEL OROZCO, ADOB Apps"/>
	<title class="pacifico">Analytical Core</title>
	
	<link rel="icon" type="img/svg" href="./adob-mixcore/core/images/bootstrap-icons/cpu.svg">
	
	<!-- Bootstrap style -->
	<link href="./adob-mixcore/core/bootstrap/style/css/bootstrap.css" rel="stylesheet">
	<link href="./adob-mixcore/core/bootstrap/style/css/custom.css" rel="stylesheet">
	<link href="./adob-mixcore/core/bootstrap/style/css/bootstrap-icons.css" rel="stylesheet"/>
	<!-- Bootstrap style -->

	<!-- jquery-ui style -->
	<link href="./adob-mixcore/core/jquery/jquery-ui/style/jquery-ui.css" rel="stylesheet">
	<!-- jquery-ui style -->

	<!-- Custom Fonts from Google -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Macondo|Pacifico|Ruda|Spirax" rel="stylesheet" type="text/css">
	<!-- Custom Fonts from Google -->
</head>
<body>

	<!-- Navigation -->
	<nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
		<!-- Logo and responsive toggle -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<span class="glyphicon glyphicon-king"></span> 
				</a>
			</div>
			<!-- Navbar links -->
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
						<a href="./index.html">Inicio</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Más <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a data-toggle="modal" data-target="#ModalContac">Contactanos</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>
	<!--navbar-->

	<!--$HEADER-->
	<header id="header">
		<div class="header-content">
			<div class="header-content-inner">
				<h1 class="pacifico">Usuario</h1>
			</div>
		</div>
	</header>
	<!--$HEADER-->

	<!-- $Modal --> 
	<div class="modal fade" id="ModalContac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
					<h4 class="modal-title pacifico" id="myModalLabel">Contactanos</h4> 
				</div> 
				<div class="modal-body"> 
					<p class="pacifico">¿Cómo? </p>
					<p class="spirax">email: acxelorozco@gmail.com</p>
				</div> 
				<div class="modal-footer"> 
					<button type="button" class="btn btn-default azul macondo" data-dismiss="modal">Close</button> 
				</div> 
			</div> 
		</div> 
	</div> 
<!-- $Modal -->

<!-- Alert section -->
	<section class="content" id="AlertSPSection">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<!--Alerts-->
					<div id="AlertSPSuccess" class="alert alert-success alert-dismissable">
						<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
					</div>

					<div id="AlertSPInfo" class="alert alert-info alert-dismissable">
						<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
					</div>

					<div id="AlertSPWarning" class="alert alert-warning alert-dismissable">
						<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">
							&times;
						</button>
					</div>

					<div id="AlertSPDanger" class="alert alert-danger alert-dismissable">
							<button  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
					<!--Alerts-->
				</div>
			</div>
		</div>
	</section>
	<!-- Alert section -->

	<!--Section tabpanel-->
	<section class="content content-3">
		<div class="container">
			<div role="tabpanel">
			<!-- Tablist panel control-->
				<ul class="nav nav-tabs" role="tablist"> 
					<li role="presentation" class="active">
						<a href="#home_calc" aria-controls="home_calc" role="tab" data-toggle="tab">Calculadora analítica</a>
					</li> 
					<li role="presentation">
						<a href="#ino-calc" aria-controls="ino-calc" role="tab" data-toggle="tab">Calculadora inorganica</a>
					</li> 
					<li role="presentation">
						<a href="#other" aria-controls="other" role="tab" data-toggle="tab">Otra calculadora</a>
					</li>
				</ul> 
			<!-- Tablist panel control-->
				
				<div class="tab-content">
				<!-- Tab1 -->
					<div role="tabpanel" class="tab-pane fade in active mini spirax" id="home_calc">
						<!-- 
						<div class="well well-sm"><a data-toggle="modal" data-target="#Modalkps">Calculo de solubilidad y Kps</a></div>-->
						<div class="well well-sm"><a href="#" id="dialog-link-sorkps" class=" verde ui-state-default ui-corner-all">Calculo de solubilidad y Kps</a></div>
					</div>
				<!-- Tab1 -->

				<!-- Tab2 -->
					<div role="tabpanel" class="tab-pane fade mini spirax" id="ino-calc"> 
					<!-- Container Banner-->
						<div class='col-ml-9'><hr/></div>
						<div class='col-ml-9'>
							<button class="btn btn-primary" id="btn_m-p" data-toggle="modal" data-target="#ModalPetition">¡Vamos!</button>
							<div class='col-ml-9'><hr/></div>
							
						</div>
					<!-- Container Banner-->
					</div>
				<!-- Tab2 -->
				
				<!-- Tab3 -->
					<div role="tabpanel" class="tab-pane fade mini spirax" id="other">
					<!-- Container Banner-->
						<div class='col-ml-9'><hr/></div>
					<!-- Container Banner-->
					</div>
				<!-- Tab3 -->
					
					<div role="tabpanel" class="tab-pane fade mini spirax" id="more">
					</div>
				</div> 
			</div>
		</div>
	</section>
	<!--Section tabpanel-->


<!-- Kps or Solubility -->
	<div id="s-kps-dialog-sorkps" title="Dialogo">
		<p>¿Desea calcular kps o solubilidad?</p>
	</div>
<!-- Kps or Solubility -->

<!-- Modal Kps--> 
	<div class="modal fade" id="Modalkps" tabindex="-1" role="dialog" aria-labelledby="s-kps-mlabel" aria-hidden="true">
		<div class="modal-dialog"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
					<h4 class="modal-title pacifico" id="s-kps-mlabel">Calcular Kps</h4>
				</div> 
				<!-- modal-body-->
				<div class="modal-body">
					<form id="s-kps-form">
					<!-- Compuesto -->
						<div class="form-group">
							<label for="s-kps-input-element1" class="control-label col-sm-3 macondo">Ion 1</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon" id="s-kps-addon-element1">*</span>
									<input required type="text" id="s-kps-input-element1" name="s_kps_input_element1" class="form-control macondo" ariadescribedby="s-kps-addon-element1" placeholder="e.g. Na">
								</div>
								<!-- Subindex control -->
								<div class="input-group col-sm-9">
									<span id="s-kps-addon-subind-1" class="input-group-addon">Subindice</span>
									<input type="number" id="s-kps-subind-element1" name="s_kps_subind_element1" min="1" value="1" ariadescribedby="s-kps-addon-subind-1">
								</div>
								<!-- Subindex control -->
								<!-- Concentration control -->
								<div class="input-group col-sm-6">
									<span id="s-kps-addon-M-1" class="input-group-addon">[Molarity]</span>
									<input type="number" id="s-kps-concentration-e1" name="s_kps_concentration_e1" class="form-control macondo" min="0.00001" step="0.00001" value="1.0" ariadescribedby="s-kps-addon-M-1">
								</div>
								<!-- Concentration control -->
								<!-- Common ion -->
								<div class="input-group col-sm-6" id="s-kps-section-ci-1">
									<span id="s-kps-addon-ci-1" class="input-group-addon">[Ion1]</span>
									<input type="number" id="s-kps-concentration-ci-e1" name="s_kps_concentration_ci_e1" class="form-control macondo" min="0.00000" step="0.00001" value="0.0" ariadescribedby="s-kps-addon-ci-1">
								</div>
								<!-- Common ion -->
								<div class="row"><div class="col-sm-12"><hr></div></div>
							</div>

							<div class="row"></div>

							<label for="s-kps-input-element2" class="control-label col-sm-3 macondo">Ion 2</label>
							<div class="col-sm-9">
								<div class="input-group">
									<span class="input-group-addon" id="s-kps-addon-element2">*</span>
									<input required type="text" id="s-kps-input-element2" name="s_kps_input_element2" class="form-control macondo" ariadescribedby="s-kps-addon-element2" placeholder="e.g. Cl">
								</div>
								<!-- Subindex control -->
								<div class="input-group col-sm-9">
									<span id="s-kps-addon-subind-2" class="input-group-addon">Subindice</span>
									<input type="number" id="s-kps-subind-element2" name="s_kps_subind_element2" value="1" ariadescribedby="s-kps-addon-subind-2" min="1">
								</div>
								<!-- Subindex control -->
								<!-- Concentration control -->
								<div class="input-group col-sm-6">
									<span id="s-kps-addon-M-2" class="input-group-addon">[Molarity]</span>
									<input type="number" id="s-kps-concentration-e2" name="s_kps_concentration_e2" class="form-control macondo" min="0.00001" step="0.00001" value="1.0" ariadescribedby="s-kps-addon-M-2">
								</div>
								<!-- Concentration control -->
								<!-- Common ion -->
								<div class="input-group col-sm-6" id="s-kps-section-ci-2">
									<span id="s-kps-addon-ci-2" class="input-group-addon">[Ion2]</span>
									<input type="number" id="s-kps-concentration-ci-e2" name="s_kps_concentration_ci_e2" class="form-control macondo" min="0.00000" step="0.00001" value="0.0" ariadescribedby="s-kps-addon-ci-2">
								</div>
								<!-- Common ion -->
								<!-- /mu -->
								<div class="input-group col-sm-6" id="s-kps-section-mu">
									<span id="s-kps-addon-mu" class="input-group-addon">&mu;</span>
									<input type="number" id="s-kps-mu-value" name="s_kps_mu_value" class="form-control macondo" min="0" max="0.1" step="0.0001" value="0.0" ariadescribedby="s-kps-addon-mu">
								</div>
								<!-- /mu -->
								<!-- Efectos ionicos -->
								<p id="s-kps-parag-cie" class="macondo"><input type="checkbox" name="s_kps_check_c_ion" id="s-kps-check-c-ion"> ¿Ion común?</p>
								<p id="s-kps-parag-ife" class="macondo"><input type="checkbox" name="s_kps_check_f_ion" id="s-kps-check-f-ion"> ¿Fuerza iónica?</p>
								<!-- Efecto ionicos -->
								<p id="s-kps-p-hint" class="macondo">Hint:</p>
							</div>
						</div>
					<!-- Compuesto -->
					<!--  --><!--  -->
					<!-- Separador -->
						<div class="col-md-9"></div>
					<!-- Separador -->

					<!--btn-toolbar-->
						<div class="form-group">
							<div class="btn-toolbar" role="toolbar" id="s-kps-virtkey">
								<div class="btn-group">
									<button class="btn btn-primary" id="s-kps-btn_close">&times;</button>
									<button class="btn btn-primary" id="s-kps-btn_inp-exp">x^{}</button>
									<button class="btn btn-primary" id="s-kps-btn_inp-sub">X_{}</button>
									<button class="btn btn-primary" id="s-kps-btn_inp-10x">10^{}</button>
									<button type="sumit" class="sumit btn btn-primary" id="s-kps-btn_calc" data-loading-text="Calculando">Calcular</button>
								</div>
							</div>
						</div>
					<!--btn-toolbar-->
					</form>
					<!--Alert section-->
					<div class="row">
						<div class="col-sm-6" id="alert-kps-section">
						
						</div>				
					</div>
					<!--Alert section-->
				</div> 
				<!-- modal-body-->
				<!-- modal-footer-->
				<div class="modal-footer"> 
					<button type="button" class="btn btn-default azul macondo" data-dismiss="modal">Close</button> 
				</div> 
				<!-- modal-footer-->
			</div> 
		</div> 
	</div> 
<!-- Modal kps-->


<!--  -->
	<section class="content content-2">
		<div class="container">
			<!--$Progress bar-->
			<!--<div class="col-sm-9 col-md-9 col-ml-9"><hr/></div>-->
			<div class="col-sm-9 col-md-9 col-ml-9">
				<div class="progress progress-bar-striped active">
					<div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
						<span class="sr-only">% completed</span>
					</div>
				</div>
			</div>
			<div class="col-md-9"><hr/></div>
			<!--$Progress bar-->
			<div class="col-sm-12">
				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="" data-original-title="Tooltip on left">Tooltip on left</button>
				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>
				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>
				<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right">Tooltip on right</button>
			</div>
			<div class="col-md-9"><hr/></div>
			<!--div media objects-->
			<div class="col-sm-12">
				<button type="button" class="btn btn-default" title="Popover title"data-container="body" data-toggle="popover" data-placement="left" data-content="Some content in Popover on left">Popover on left</button>
				<button type="button" class="btn btn-primary" title="Popover title" data-container="body" data-toggle="popover" data-placement="top"data-content="Some content in Popover on top">Popover on top</button>
				<button type="button" class="btn btn-success" title="Popover title" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Some content in Popover on bottom"Popover on bottom>Popover on bottom</button>
				<button type="button" class="btn btn-warning" title="Popover title" data-container="body" data-toggle="popover" data-placement="right" data-content="Some content in Popover on right">Popover on right</button>
			</div>
		</div>
	</section>
<!--  -->


	<!-- Footer -->
	<footer class="page-footer">

		<!-- Contact Us -->
		<div class="contact">
			<div class="container">
				<h2 class="section-heading">Contact Us</h2>
				<p><span class="glyphicon glyphicon-envelope"></span><br> acxelorozco@gmail.com</p>
				<p><span class="glyphicon glyphicon-fire"></span><br/>Powered by ADOB Apps</p> 
			</div>
		</div>
		<!-- Copyright etc -->
		<div class="small-print">
			<div class="container">
				<p>Copyright &copy; ADOB Apps 2021</p>
			</div>
		</div>
	</footer>
	<!-- Footer -->

	<!-- jQuery -->
	<script src="./adob-mixcore/core/jquery/jquery-1.11.3.min.js"></script>
	<script src="./adob-mixcore/core/jquery/jquery.easing.min.js"></script>
		<!-- jQuery-ui -->
	<script src="./adob-mixcore/core/jquery/jquery-ui/script/jquery-ui.js"></script>
	<script src="./adob-mixcore/core/jquery/jquery-ui/script/custom.js"></script>
		<!-- jQuery-ui -->
	<!-- jQuery -->

	<!-- Bootstrap -->
	<script src="./adob-mixcore/core/bootstrap/script/ie10-viewport-bug-workaround.js"></script>
	<script src="./adob-mixcore/core/bootstrap/script/bootstrap.js"></script>
	<!-- Bootstrap -->

	<script src="./analyticalcore/modules/kps/js/main.kps.js"></script>
	<script src="./analyticalcore/modules/kps/js/jqueryui.kps.js"></script>
	
</body>
</html>
