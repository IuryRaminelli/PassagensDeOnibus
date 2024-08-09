<?php
    include_once '../Model/User.php';
    include_once '../Controller/ConUser.php';


    if(isset($_POST['cadastrar'])){
        $arrrayUser = array("apelido" => $_POST['apelido'],
                          "nome" => $_POST['nome'],
                          "senha" => $_POST['senha'],
                          "CPF" => $_POST['CPF'],
                          "Telefone" => $_POST['Telefone']
                        );


    $ConUser = new ConUser();
    $User = new User($arrrayUser);


    $ConUser->insertUser($User);
    header("Location: TelaLogin.php");
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
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
                            <?php 
                                endif; 
                                if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "adm"):
                                    ?>
                                    
                                    <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                                    <?php 
                                        endif; 
                                if(!isset($_SESSION["USER_LOGIN"])):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaLogin.php">Logar</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadUser.php">Cadastrar</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>


    <div class="container">
        <br>

        <div class="container" style="width: 40%;">
		<form align="center" method="POST" action="TelaCadUser.php">
			<h2>CADASTRE-SE</h2>
            <br>
            <label for="apelido"> Apelido </label>
			<input 
				type="text" 
				name="apelido" 
				id="apelido" 
				class="form-control" 
				pattern="[A-Za-z-0-9., -]{4,255}$"
				oninvalid="setCustomValidity('Por favor, insira pelo menos 4 letras!')">

            <br>

			<label for="nome"> Nome </label>
			<input 
				type="text" 
				name="nome" 
				id="nome" 
				class="form-control" 
				pattern="[A-Za-z-0-9., -]{7,255}$"
				oninvalid="setCustomValidity('Por favor, insira pelo menos 7 letras!')">
											
			<br>

			<label for="CPF"> CPF </label>
			<input 
				type="text"
				title="Digite o CPF no formato 000.000.000-00" 
				class="form-control" 
				pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
				id="CPF" 
				name="CPF">

			<br>

			<label for="Telefone"> Telefone </label>
			<input 
				type="text" 
				id="Telefone" 
				name="Telefone" 
				class="form-control" 
				pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$">

			<br>

			<label for="senha"> Senha </label>
			<input 
				type="password" 
				id="senha" 
				name="senha" 
				class="form-control" 
				pattern="^.{6,15}$"
				title="Senha com no minímo 6 caracteres de letras e números">
											
			<br>

			<label> <a href="TelaLogin.php"> Já possui cadastro? </a> </label> 
			<br><br>
			<button 
				type="submit" 
				name="cadastrar" 
				class="btn btn-primary"
				>Cadastrar</button>
		</form>
        
    </div>
    


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>