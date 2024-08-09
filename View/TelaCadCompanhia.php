<?php
    include_once '../Model/CompanhiaOnibus.php';
    include_once '../Controller/ConCompanhia.php';


    if(isset($_POST['cadastrar'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileIMG"])){
            $target_dir = "Logo/";
            $target_file = $target_dir . basename($_FILES["fileIMG"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


           
            if (move_uploaded_file($_FILES["fileIMG"]["tmp_name"], $target_file)){
                   
                $arrrayCIA = array("nomeCIA" => $_POST['nomeCIA'],
                                       "localCIA" => $_POST['localCIA'],
                                       "telefone" => $_POST['telefone'],
                                       "email" => $_POST['email'],
                                       "logo" => $target_file
                );


                $ConCompanhia = new ConCompanhia();
                $CompanhiaOnibus = new CompanhiaOnibus($arrrayCIA);


                $ConCompanhia->insertCIA($CompanhiaOnibus);
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=TelaLogin.php'>
                <script type=\"text/javascript\">
                    alert(\"Companhia cadastrada com sucesso.\");
                </script>
                ";
            }else {
                echo "
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=TelaLogin.php'>
                <script type=\"text/javascript\">
                    alert(\"Desculpe, houve um erro ao enviar seu arquivo.\");
                </script>
                ";
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
                                if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "adm"):
                            ?>
                        
                            <li class="nav-item"><a class="nav-link active" href="TelaCadCompanhia.php">Companhias</a></li>
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
		<form align="center" method="POST" action="TelaCadCompanhia.php" enctype="multipart/form-data">
			<h2>CADASTRAR COMPANHIA</h2>
            <br>
			<label for="nomeCIA"> Nome </label>
			<input 
				type="text" 
				name="nomeCIA" 
				id="nomeCIA" 
				class="form-control">
											
			<br>

			<label for="localCIA"> Local </label>
			<input 
				type="text"
				class="form-control" 
				id="localCIA" 
				name="localCIA">

			<br>

            <label for="telefone"> Telefone </label>
			<input 
				type="text" 
				id="telefone" 
				name="telefone" 
				class="form-control">

			<br>

			<label for="email"> Email </label>
			<input 
				type="email" 
				id="email" 
				name="email" 
				class="form-control" 
				pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$">

			<br>

            <label for="fileIMG"> Logo </label>
			<input 
				type="file" 
				id="fileIMG" 
				name="fileIMG" 
				class="form-control">

			<br>

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