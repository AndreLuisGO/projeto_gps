<?php session_start(); 
	//var_dump($_SESSION);
	if(empty($_SESSION)){
		?>
        	<script>
				document.location.href = '..';
			</script>
        <?php	
	}
?>

<!doctype html>
<html>
<head>
	
    <meta charset="utf-8">
    <title>AFAST ICT</title>
    
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

          <a class="col-md-3" id="icticon"><img src="../img/logo_ICT1.0.png" width="60" height="64" alt=""/></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        
          
          <ul class="nav navbar-nav navbar-right">
          
          	<li><a href="#" id="gerenciar_admin">ADMINISTRADOR</a></li>
              
            <li><a href="#" id="afast_sistema">HOME</a></li>
                       
            <li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR </a></li>
          </ul>
        
      </div><!-- /.container-fluid -->
    </nav>
    
    <!-- Paginas carregadas aqui -->
    <main class="container-fluid" id="loader"></main>
   	<!-- Paginas carregadas aqui -->
    
	
    <footer class="mainfooter navbar-default navbar-fixed-bottom">
    	<section>
        	<a class="col-md-3" id="afasticon"><img src="../img/logo_AFAST1.5.png" width="60" height="64" alt=""/></a>
        	<p class="text-right footertext col-md-9"> Todos os direitos reservados. </p>
        </section>    
    </footer>
	
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/npm.js"></script>
    <script type="text/javascript" src="../js/jquerymask.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
</body>
</html>