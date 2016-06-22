<!doctype html>
<html>
<head>
	
    <meta charset="utf-8">
    <title>Login - AFAST ICT</title>
    
    <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

          <a class="col-md-3" id="icticon"><img src="img/logo_ICT1.0.png" width="60" height="64" alt="Logo ICT"/></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        
          
          <ul class="nav navbar-nav navbar-right">
          
  
              
            <li><a href="#" class="navtext" id="">HOME</a></li>
                       
            <li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR </a></li>
          </ul>
        
      </div><!-- /.container-fluid -->
    </nav>
    
    
    <main class="container-fluid" id="loader">
    	 <br><br><br><br>
    	<div class="row">
          <div class="col-md-3 "></div>
		  <div class="col-md-3 ">
            <img src="img/logo_AFAST1.5.png" alt="Logo AFAST" class="img-responsive img-rounded">
          </div>
          <div class="col-md-3 ">
              	<br><br><br><br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="basic-addon1">Usuário *</span>
                    <input type="text" class="form-control" id="nome_treinador" placeholder="Nome" aria-describedby="basic-addon1">
                </div>
                <br><br>
				<div class="input-group input-group-lg">
                    <span class="input-group-addon" id="basic-addon1">Senha *</span>
                    <input type="password" class="form-control" id="senha_treinador" placeholder="Senha" aria-describedby="basic-addon1">
                </div>
                <br><br>
                <button type="submit" class="pull-right btn btn-lg btn-default">Entrar</button>             
          </div> 
                
        </div>
        <div class="col-md-3 "></div>
        <br><br><br><br><br>
		<p class="text-center text-titulo col-md-12">Sistema de Gerenciamento de Frequência de Docentes</p>
    </main>
   	
      
	
    <footer class="mainfooter navbar-default navbar-fixed-bottom">
    	<section>
        	<!--<a class="col-md-3" id="afasticon"><img src="img/logo_AFAST1.5.png" width="60" height="64" alt=""/></a>-->
        	<p class="text-right footertext col-md-12"> Todos os direitos reservados. </p>
        </section>    
    </footer>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/jquerymask.min.js"></script>
</body>
</html>