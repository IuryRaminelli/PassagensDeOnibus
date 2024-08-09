<?php
                include_once "../Controller/ConUser.php";
                include_once "../Model/User.php";
                if(isset($_POST['apelido']) && isset($_POST['senha'])){
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    $ConUser = new ConUser();
                    $linha = $ConUser->selectLoginUser1($_POST['apelido']);

                    if($linha == null){
                        echo "
                        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=TelaLogin.php'>
                        <script type=\"text/javascript\">
                            alert(\"Desculpe, essa conta não existe.\");
                        </script>
                        ";
                    }else{
                        if($linha != null){
                            $user = new User($linha[0]);
                            if(($user->getApelido() == $_POST['apelido']) && ($user->getSenha() == $_POST['senha'])){
                                $_SESSION["USER_LOGIN"] = $_POST['apelido'];
                                header("Location: TelaMenu.php");
                                exit;
                            }else{
                                echo "
                                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=TelaLogin.php'>
                                <script type=\"text/javascript\">
                                    alert(\"Erro!\");
                                </script>
                                ";
                            }
                        }
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
                                if(isset($_SESSION["USER_LOGIN"])):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                            <?php 
                                endif; 
                                if(!isset($_SESSION["USER_LOGIN"])):
                            ?>
                            <li class="nav-item"><a class="nav-link active" href="TelaLogin.php">Logar</a></li>
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
		<form align="center" method="POST" action="TelaLogin.php">
			<h2>LOGIN</h2>
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

			<label for="senha"> Senha </label>
			<input 
				type="password" 
				id="senha" 
				name="senha" 
				class="form-control" 
				pattern="^.{6,15}$"
				title="Senha com no minímo 6 caracteres de letras e números">
											
			<br>

			<label> <a href="TelaCadUser.php"> Não possui cadastro? </a> </label> 
			<br><br>
			<button 
				type="submit" 
				name="cadastrar" 
				class="btn btn-primary"
				>Entrar</button>
		</form>
        
    </div>

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>