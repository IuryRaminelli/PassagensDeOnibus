<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }


        include_once "../Controller/ConAssento.php";
        include_once "../Controller/ConUser.php";
        include_once "../Model/Assento.php";
        include_once "../Model/User.php";


        $assentos_selecionados = $_POST['assentos_selecionados'];
        $total = $_POST['total'];
        $_SESSION["preco_total"] = $_POST['total'];


        // Agora você pode usar $assentos_selecionados e $total conforme necessário
        print_r($assentos_selecionados);
        $total;
        $_SESSION["id_fk_onibus"];
        $_SESSION["preco_onibus"];
        $_SESSION["USER_LOGIN"];


        $ConUser = new ConUser();
        $linha = $ConUser->selectLoginUser1($_SESSION["USER_LOGIN"]);
   
        if($linha != null){
            $user = new User($linha[0]);
            $conAssento = new ConAssento();
            for($i = 0; $i < count($assentos_selecionados); $i++){
                $conAssento->updateAss($user->getIdUser(), "ocupado", $assentos_selecionados[$i],$_SESSION["id_fk_onibus"]);
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
    <title>Document</title>
</head>
<body>
<section class="section-inicio">
    <header class="header-inicio">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="TelaMenu.php">
                    <img src="Logo/logoo-ads.png" alt="Logo" width="67" height="67" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "adm"): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaCadCompanhia.php">Companhias</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadOnibus.php">Onibus</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                        <?php elseif (isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "adm"): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="TelaLogin.php">Logar</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadUser.php">Cadastrar</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</section>

<br>

<div class="container">

    <br>

    <div class="container" style="width: 40%;">
		<form align="center" action="TelaCompra.php" method="POST">
            <div><p><b><?php echo 'Preço: R$ '.$total;?></b></p></div>
            <br>
            
            <label for="formaPag">Forma de Pagamento:</label>
            <br>
            <div
                class="btn-group"
                role="group"
                aria-label="Basic checkbox toggle button group"
            >
                <input
                    type="radio"
                    class="btn-check"
                    name="formaPag"
                    value="pix"
                    id="pix"
                    autocomplete="off"
                />
                <label
                    class="btn btn-outline-primary"
                    for="pix"
                    >PIX</label
                >
            
                <input
                    type="radio"
                    class="btn-check"
                    name="formaPag"
                    id="dinheiro"
                    value="dinheiro"
                    autocomplete="off"
                />
                <label
                    class="btn btn-outline-primary"
                    for="dinheiro"
                    >Dinheiro</label
                >
            
                <input
                    type="radio"
                    class="btn-check"
                    name="formaPag"
                    value="credtio"
                    id="credito"
                    autocomplete="off"
                />
                <label
                    class="btn btn-outline-primary"
                    for="credito"
                    >Crédito</label
                >

                <input
                    type="radio"
                    class="btn-check"
                    name="formaPag"
                    value="debito"
                    id="debito"
                    autocomplete="off"
                />
                <label
                    class="btn btn-outline-primary"
                    for="debito"
                    >Débito</label
                >
            </div>

            <br><br>

            <label for="dia">Data:</label>
			<input 
				type="datetime-local"
				name="dia" 
				id="dia" 
				class="form-control">

            <br>

            <br>
			<button 
				type="submit" 
				name="btConfirma" 
				class="btn btn-primary"
				>Confirmar</button>
        </form>   
    </div>
</div>
</body>
</html>