<?php
        include_once "../Controller/ConPass.php";
        include_once "../Controller/ConUser.php";
        include_once "../Model/PassagemCompra.php";
        include_once "../Model/User.php";
        if(isset($_POST['btConfirma'])){
            session_start();
            $ConUser = new ConUser();
            $linha = $ConUser->selectLoginUser1($_SESSION["USER_LOGIN"]);
   
            if($linha != null){
                $user = new User($linha[0]);
               
                $arrrayPassagem = array("fkOnibus" => $_SESSION["id_fk_onibus"],
                              "fkUser" => $user->getIdUser(),
                              "preco" => $_SESSION["preco_total"],
                              "formaPag" => $_POST['formaPag'],
                              "dataHoraComprada" => $_POST['dia']
                            );
   
                $ConPass = new ConPass();
                $Passagem = new PassagemCompra($arrrayPassagem);
                $ConPass->insertPass($Passagem);
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Rodoviária</title>
</head>
<body>
    <section class="section-inicio">
        <header class="header-inicio">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="TelaMenu.php"><img src="Logo/logoo-ads.png" alt="Logo" width="67" height="67" class="d-inline-block align-text-top"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "adm"):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaCadCompanhia.php">Companhias</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadOnibus.php">Onibus</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "adm"): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if(!isset($_SESSION["USER_LOGIN"])): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaLogin.php">Logar</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadUser.php">Cadastrar</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>

    <div class="container">
		<br>
		<div class="row">
			<div class="text-center">
				<span class="icon"><img src="Logo/iconcar.png" alt=""></span>
				<h2>Obrigado por comprar, seu pedido está finalizado</h2>
				<br>
				<p>
					<a href="TelaMenu.php"class="btn btn-primary">Inicio</a>
					<a href="TelaPerfil.php"class="btn btn-primary btn-outline">Perfil</a>
				</p>
			</div>
		</div>
	</div>