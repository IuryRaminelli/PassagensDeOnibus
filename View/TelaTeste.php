<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assentos do Ônibus</title>
    <link rel="stylesheet" href="teste.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="row">
        <div class="col-lg-6">
            <div class="assentos">
                <h1>Assentos do Ônibus</h1>
                <br>
                <p>Assentos Disponíveis: <span id="quantidade-disponivel"></span></p>
                <p>Assentos Ocupados: <span id="quantidade-ocupado"></span></p>
                <p id="selecionados">Selecionados: Nenhum</p>
                <br>
                <table id="table">
                    <?php
                    if(isset($_POST["selecionar"]) && isset($_SESSION["USER_LOGIN"])):
                        include_once("../Controller/ConAssento.php");
                        include_once("../Model/Assento.php");


                        $_SESSION["id_fk_onibus"] = $_POST['idonibus'];
                        $_SESSION["preco_onibus"] = $_POST['preco'];


                        $conAssento = new ConAssento();
                        $lista = $conAssento->selectEstado($_POST['idonibus']);
                        if(empty($lista)){
                            echo'
                            <div>
                                Todos assentos disponíveis!
                            </div>
                            ';
                        }      
                            $aux = 0;
                            for ($i=1; $i <= 10; $i++): ?>
                                <tr>
                                    <td class="<?php
                                        $aux+=1;
                                        foreach($lista as $assento){
                                            $assento = new Assento($assento);
                                            if($assento->getnumAssento() == $aux){
                                                echo $assento->gettipoAssento() ?: 'disponivel';
                                            }
                                        }
                                    ?>"><?php echo $aux; ?></td>
                                    <td class="<?php
                                        $aux+=1;
                                        foreach($lista as $assento){
                                            $assento = new Assento($assento);
                                            if($assento->getnumAssento() == $aux){
                                                echo $assento->gettipoAssento() ?: 'disponivel';
                                            }
                                        }
                                    ?>"><?php echo $aux; ?></td>
                                    <td class="corredor"></td>
                                    <td class="<?php
                                        $aux+=1;
                                        foreach($lista as $assento){
                                            $assento = new Assento($assento);
                                            if($assento->getnumAssento() == $aux){
                                                echo $assento->gettipoAssento() ?: 'disponivel';
                                            }
                                        }
                                    ?>"><?php echo $aux; ?></td>
                                    <td class="<?php
                                        $aux+=1;
                                        foreach($lista as $assento){
                                            $assento = new Assento($assento);
                                            if($assento->getnumAssento() == $aux){
                                                echo $assento->gettipoAssento() ?: 'disponivel';
                                            }
                                        }
                                    ?>"><?php echo $aux; ?></td>
                                </tr>
                    <?php endfor;?>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="resumo">
                <div class="cart-detail">
                    <h1>Resumo</h1>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><?php echo '<b>Número Ônibus: </b>' . $_POST['onibus'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo '<b>Origem/Destino: </b>' . $_POST['origem'] . ' -> ' . $_POST['destino'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo '<b>Horário: </b>' . $_POST['saida'] . ' -> ' . $_POST['chegada'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo '<b>Tipo: </b>' . $_POST['tipo'];?></td>
                            </tr>
                            <tr>
                                <td><br><p id="valor"><?php echo 'TOTAL: '.number_format('0', 2, ",", ".");?></p></td>
                            </tr>
                        <?php 
                        endif; 
                        if(!isset($_SESSION["USER_LOGIN"])){
                            header("Location: TelaLogin.php");
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form-selecionados" method="POST" action="seu_arquivo_php.php">
                                <input type="hidden" id="total" name="total" value="">
                                <div id="assentos-selecionados"></div>
                                <input type="submit" class="btn btn-primary" value="Continuar" name="enviar">
                            </form>
                            <br>
                            <p><a href="TelaMenu.php" class="btn btn-primary">Voltar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        var assentosDisponiveis = <?php echo $conAssento->selectDisponivel($_POST['idonibus']); ?>;
        var assentosOcupados = <?php echo $conAssento->selectOcupado($_POST['idonibus']); ?>;
        var selecionados = [];
        var precoPorAssento = parseFloat("<?php echo $_POST['preco']; ?>");

        function atualizarQuantidades() {
            document.getElementById('quantidade-disponivel').textContent = assentosDisponiveis;
            document.getElementById('quantidade-ocupado').textContent = assentosOcupados;
        }

        function mudaStatus(coluna) {
            if (coluna.classList.contains("disponivel")) {
                if (confirm("Quer reservar esse assento?")) {
                    coluna.classList.remove("disponivel");
                    coluna.classList.add("ocupado2");
                    coluna.classList.add("ocupado");
                    assentosDisponiveis--;
                    assentosOcupados++;
                    selecionados.push(coluna.textContent.trim());
                    atualizaStatus();
                }
            } else if (coluna.classList.contains("ocupado2")) {
                if (confirm("Quer retirar a reserva desse assento?")) {
                    coluna.classList.remove("ocupado2");
                    coluna.classList.add("disponivel");
                    assentosDisponiveis++;
                    assentosOcupados--;
                    var index = selecionados.indexOf(coluna.textContent.trim());
                    if (index !== -1) {
                        selecionados.splice(index, 1);
                    }
                    atualizaStatus();
                }
            }
        }

        document.getElementById("table").addEventListener('click', function (e) {
            mudaStatus(e.target);
        });

        document.getElementById("table").addEventListener('mouseover', function (e) {
            hover(e.target);
        });

        document.getElementById("table").addEventListener('mouseout', function (e) {
            hover1(e.target);
        });

        function hover(coluna) {
            if (coluna.classList.contains("disponivel")) {
                coluna.style.backgroundColor = '#F0F0F0';
                coluna.style.color = '#F0F0F0';
            }
        }

        function hover1(coluna) {
            if (coluna.classList.contains("disponivel")) {
                coluna.style.backgroundColor = "#90EE90";
                coluna.style.color = "#90EE90";
            } else if (coluna.classList.contains("ocupado2")) {
                coluna.style.backgroundColor = "#FF6347";
                coluna.style.color = "#FF6347";
            }
        }

        function atualizaStatus() {
            var total = selecionados.length * precoPorAssento;
            document.getElementById("quantidade-ocupado").textContent = assentosOcupados;
            document.getElementById("quantidade-disponivel").textContent = assentosDisponiveis;
            document.getElementById("selecionados").textContent = "Selecionados: " + (selecionados.length > 0 ? selecionados.join(", ") : "Nenhum");
            document.getElementById("valor").textContent = "TOTAL: R$ " + total.toFixed(2).replace(".", ",");

            var assentosContainer = document.getElementById("assentos-selecionados");
            assentosContainer.innerHTML = "";

            selecionados.forEach(function(assento) {
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "assentos_selecionados[]";
                input.value = assento;
                assentosContainer.appendChild(input);
            });

            document.getElementById("total").value = total.toFixed(2);
        }

        atualizarQuantidades();
    };
</script>

</body>
</html>
