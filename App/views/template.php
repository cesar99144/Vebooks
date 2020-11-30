<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Vebooks</title>
		<!-- Compiled and minified CSS -->
  
    	<!--Teste -->
    	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Home | E-Shopper</title>
	    <link href="<?php echo URL_BASE; ?>css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/font-awesome.min.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/prettyPhoto.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/price-range.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/animate.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/main.css" rel="stylesheet">
	    <link href="<?php echo URL_BASE; ?>css/responsive.css" rel="stylesheet">
	    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
	    <![endif]-->       
	    <link rel="shortcut icon" href="<?php echo URL_BASE; ?>images/ico/favicon.ico">
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo URL_BASE; ?>images/ico/apple-touch-icon-144-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo URL_BASE; ?>images/ico/apple-touch-icon-114-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo URL_BASE; ?>images/ico/apple-touch-icon-72-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" href="<?php echo URL_BASE; ?>images/ico/apple-touch-icon-57-precomposed.png">
   
	</head>
	<body>

		<header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>(81)9876453</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>Vebooks@atendimento.com</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/home/index"><img src="<?php echo URL_BASE; ?>imagens/Logo4.png" alt="" /></a>
                        </div>
                        
                    </div>
                
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">

                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>

                                <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 3): ?>

                                    <li><a href="/livros/adicionar">Adicionar livro</a></li>
                                    <li><a  href="/fornecedor/buscarObrasDoEscritor/<?php echo $_SESSION['userId'];?>">Minhas obras</a></li>
                                    <li><a href="/venda/listarVendasAutor/<?php echo $_SESSION['userId']; ?>">Vendas</a></li>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 2): ?>
                                    <li><a href="/clientes/listarCompras">Minhas compras</a></li>
                                    <li><a href="/clientes/buscarlistaDesejosCliente/<?php echo $_SESSION['userId'];?>">Lista de desejos</a></li>
                                <?php endif; ?>

                                <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 1): ?>
                                    <li><a href="/usuarios/listarUsuarios">Verificar usuários</a></li>
                                    <li><a href="/home/login">Adicionar categorias</a></li>
                                <?php endif; ?>

                                <?php if(!isset($_SESSION['logado'])): ?>
                                    <li><a href="/home/login">Login</a></li>
                                    <li><a href="/home/login">Cadastrar-se</a></li>
                                <?php else: ?>

                                    <li>Olá, <?php echo $_SESSION['userNome']; ?></li>
                                    <li><a href="/home/logout">Logout</a></li>

                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Home</a></li>
                                <li class="dropdown"><a href="#">Vebooks<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Produtos</a></li>
                                        <li><a href="product-details.html">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="/home/login">Login</a></li> 
                                    </ul>
                                </li> 
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <!--<input type="text" placeholder="Search"/>-->
                            <form method="POST" action="/livros/buscar">
                                <div class="input-field">
                                  <input id="search" style="width: 300px;" name="search" type="search" placeholder="Buscar por livro" required>
                                  <!--<label class="label-icon" for="search"><i class="material-icons">search</i></label>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

        <?php require_once '../App/views/'.$view.'.php'; ?>
	</body>
</html>