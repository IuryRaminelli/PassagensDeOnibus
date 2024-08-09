<?php
    include_once '../Model/Onibus.php';
    include_once '../Controller/ConOnibus.php';
    include_once '../Model/Assento.php';
    include_once '../Controller/ConAssento.php';


    if(isset($_POST['cadastrar'])){
        $arrrayUser = array("fkCIA" => $_POST['companhia'],
                          "numOnibus" => $_POST['numero'],
                          "localOrigem" => $_POST['origem'],
                          "localDestino" => $_POST['destino'],
                          "tipoOnibus" => $_POST['tipo'],
                          "dia" => $_POST['dia'],
                          "dataHoraSaida" => $_POST['saida'],
                          "dataHoraPrevisao" => $_POST['chegada'],
                          "preco" => $_POST['preco']
                        );


        $ConOnibus = new ConOnibus();
        $Onibus = new Onibus($arrrayUser);

        $ConOnibus->insertOnibus($Onibus);

        $lista = $ConOnibus->selectNumOnibus($_POST['numero']);
        foreach($lista as $Onibus){
            $Onibus = new Onibus($Onibus);
            for($i = 1; $i <= 40; $i++){
                $arrrayAssento = array("fkOnibus" => $Onibus->getidOnibus(),
                                        "fkUser" => 5,
                                        "numAssento" => $i,
                                        "tipoAssento" => 'disponivel'
                                        );
                $conAssento = new conAssento();
                $Assento = new Assento($arrrayAssento);

                $conAssento->insertASS($Assento);
            }
        }
        echo "
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=TelaCadOnibus.php'>
        <script type=\"text/javascript\">
            alert(\"Companhia cadastrada com sucesso.\");
        </script>
        ";
    }


    function listarCompanhiasNoCombo(){
        echo '<div class="mb-3"><label for="" class="form-label">Nome da Companhia</label>
        <select class="form-select" id="companhia" name="companhia">
            <option selected>(Selecione uma Companhia):</option>';
    
        $connect = mysqli_connect('localhost','root','','onibus');
        $sql = "SELECT idCIA, nomeCIA FROM companhiaonibus";
        $result = mysqli_query($connect, $sql);
    
        while($row = mysqli_fetch_array($result)){
            echo '<option value="' . $row["idCIA"].'">'.$row["nomeCIA"].'</option>' ;
        }
        echo '</select></div>';
        mysqli_close($connect);
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
                            <li class="nav-item"><a class="nav-link active" href="TelaCadOnibus.php">Onibus</a></li>
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
		<form align="center" method="POST" action="TelaCadOnibus.php">
			<h2>CADASTRAR ONIBUS</h2>
            <br>
            <?php
                listarCompanhiasNoCombo();
            ?>
<!-- fazer um combo que mostra os nomes das companhias. --->

			<label for="numero"> Número do Onibus </label>
			<input 
				type="number" 
				name="numero" 
				id="numero" 
				class="form-control" 
				>

			<br>

			<label for="origem"> Cidade Origem </label>
			<input 
				type="text" 
				name="origem" 
				id="origem" 
				class="form-control" 
				>

			<br>

			<label for="destino"> Cidade Destino </label>
			<input 
				type="text"
				class="form-control" 
				id="destino" 
				name="destino">

			<br>

			<label for="tipo"> Tipo </label>
			<input 
				type="text" 
				id="tipo" 
				name="tipo" 
				class="form-control" >

			<br>

            <label for="dia"> Data </label>
			<input 
				type="date" 
				id="dia" 
				name="dia" 
				class="form-control"
				>
											
			<br>

			<label for="saida"> Horario de Saída </label>
			<input 
				type="time" 
				id="saida" 
				name="saida" 
				class="form-control"
				>
											
			<br>

            <label for="chegada"> Horario de Chegada </label>
			<input 
				type="time" 
				id="chegada" 
				name="chegada" 
				class="form-control"
				>
											
			<br>

            <label for="preco"> Preço </label>
			<input 
				type="text" 
				id="preco" 
				name="preco" 
				class="form-control"
				>
											
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