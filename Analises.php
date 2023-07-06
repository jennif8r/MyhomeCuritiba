<?php
include "conecta.php";

// Consulta SQL para obter o número de oportunidades criadas
$sqlTotalOportunidades = "SELECT COUNT(*) AS totalOportunidades FROM oportunidades";
$sqlTotalOportunidadesGanhas = "SELECT COUNT(*) AS totalOportunidadesGanhas FROM oportunidades WHERE fase = 'Fechado e ganho'";
// Consulta SQL para obter o valor total das propriedades vinculadas às oportunidades ganhas
$sqlValorTotalPropriedades = "SELECT SUM(p.valor) AS valorTotalPropriedades
                             FROM oportunidades o
                             INNER JOIN propriedades p ON o.fkPropriedades = p.idPropriedades
                             WHERE o.fase = 'Fechado e ganho'";

// Consulta SQL para obter a palavra mais frequente na coluna canal da tabela cliente
$sqlCanalDestaque = "SELECT canal, COUNT(*) AS count
                    FROM clientes
                    GROUP BY canal
                    ORDER BY COUNT(*) DESC
                    LIMIT 1";
 // Consulta SQL para obter a palavra mais frequente na coluna genero da tabela cliente
$sqlGeneroDestaque = "SELECT genero, COUNT(*) AS count
                    FROM clientes
                    GROUP BY genero
                    ORDER BY COUNT(*) DESC
                    LIMIT 1";

// Consulta SQL para obter a contagem de clientes em cada faixa etária
$sqlFaixaEtaria = "SELECT
    SUM(CASE WHEN DATEDIFF(CURDATE(), nascimento) / 365 BETWEEN 18 AND 25 THEN 1 ELSE 0 END) AS faixa1,
    SUM(CASE WHEN DATEDIFF(CURDATE(), nascimento) / 365 BETWEEN 26 AND 35 THEN 1 ELSE 0 END) AS faixa2,
    SUM(CASE WHEN DATEDIFF(CURDATE(), nascimento) / 365 BETWEEN 36 AND 45 THEN 1 ELSE 0 END) AS faixa3,
    SUM(CASE WHEN DATEDIFF(CURDATE(), nascimento) / 365 BETWEEN 46 AND 55 THEN 1 ELSE 0 END) AS faixa4,
    SUM(CASE WHEN DATEDIFF(CURDATE(), nascimento) / 365 BETWEEN 56 AND 65 THEN 1 ELSE 0 END) AS faixa5
FROM clientes";


$resultTotalOportunidades = mysqli_query($conexao, $sqlTotalOportunidades);
$resultTotalOportunidadesGanhas = mysqli_query($conexao, $sqlTotalOportunidadesGanhas);
$resultValorTotalPropriedades = mysqli_query($conexao, $sqlValorTotalPropriedades);
$resultCanalDestaque = mysqli_query($conexao, $sqlCanalDestaque);
$resultGeneroDestaque = mysqli_query($conexao, $sqlGeneroDestaque);
$resultFaixaEtaria = mysqli_query($conexao, $sqlFaixaEtaria);

if (!$resultTotalOportunidades || !$resultTotalOportunidadesGanhas || !$resultValorTotalPropriedades || !$resultCanalDestaque || !$resultGeneroDestaque || !$resultFaixaEtaria) {
    die("Falha na consulta ao banco de dados: " . mysqli_error($conexao));
}

// Extrair o valor da soma das oportunidades criadas
$rowTotalOportunidades = mysqli_fetch_assoc($resultTotalOportunidades);
$totalOportunidades = $rowTotalOportunidades["totalOportunidades"];

// Extrair o valor da soma das oportunidades ganhas
$rowTotalOportunidadesGanhas = mysqli_fetch_assoc($resultTotalOportunidadesGanhas);
$totalOportunidadesGanhas = $rowTotalOportunidadesGanhas["totalOportunidadesGanhas"];

// Extrair o valor total das propriedades vinculadas às oportunidades ganhas
$rowValorTotalPropriedades = mysqli_fetch_assoc($resultValorTotalPropriedades);
$valorTotalPropriedades = $rowValorTotalPropriedades["valorTotalPropriedades"];

// Extrair a palavra mais frequente na coluna canal da tabela cliente
$rowCanalDestaque = mysqli_fetch_assoc($resultCanalDestaque);
$canalDestaque = $rowCanalDestaque["canal"];

// Extrair a palavra mais frequente na coluna genero da tabela cliente
$rowGeneroDestaque = mysqli_fetch_assoc($resultGeneroDestaque);
$generoDestaque = $rowGeneroDestaque["genero"];

// Extrair a faixa de idades dos clientes
$rowFaixaEtaria = mysqli_fetch_assoc($resultFaixaEtaria);
$faixa1 = $rowFaixaEtaria["faixa1"];
$faixa2 = $rowFaixaEtaria["faixa2"];
$faixa3 = $rowFaixaEtaria["faixa3"];
$faixa4 = $rowFaixaEtaria["faixa4"];
$faixa5 = $rowFaixaEtaria["faixa5"];    
// Definir os valores para cada faixa etária
$faixa1Descricao = "18-25";
$faixa2Descricao = "26-35";
$faixa3Descricao = "36-45";
$faixa4Descricao = "46-55";
$faixa5Descricao = "56-65";
// Determinar a faixa com mais clientes
$faixaMaisClientes = max($faixa1, $faixa2, $faixa3, $faixa4, $faixa5);
// Determinar a descrição da faixa com mais clientes
if ($faixaMaisClientes == $faixa1) {
    $faixaMaisClientesDescricao = $faixa1Descricao;
} elseif ($faixaMaisClientes == $faixa2) {
    $faixaMaisClientesDescricao = $faixa2Descricao;
} elseif ($faixaMaisClientes == $faixa3) {
    $faixaMaisClientesDescricao = $faixa3Descricao;
} elseif ($faixaMaisClientes == $faixa4) {
    $faixaMaisClientesDescricao = $faixa4Descricao;
} else {
    $faixaMaisClientesDescricao = $faixa5Descricao;
}
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Análises</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centralize-text {text-align: center; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- MENU -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <button type="button" class="btn btn-outline-primary">CRM</button>
            </a>
            <a class="navbar-brand" href="#">Painel de Análises</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CRM</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cliente.php">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="propriedades.php">Propriedades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="oportunidades.php">Oportunidades</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    
    <!-- Painel -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body"style="background-color:#f8f9fa; border-color:#f8f9fa;">
                <div class="row">
                <div class="col-md-12 centralize-text">
                        <h2 class="mb-4">Oportunidades</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Oportunidades Criadas</h5>
                                <h3 class="card-text"><?php echo $totalOportunidades; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Oportunidades Ganhas</h5>
                                <h3 class="card-text"><?php echo $totalOportunidadesGanhas; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Valor Total de Oportunidades Ganhas</h5>
                                <h3 class="card-text">R$ <?php echo number_format($valorTotalPropriedades, 2, ',', '.'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body"style="background-color:#f8f9fa; border-color:#f8f9fa;">
                <div class="row">
                <div class="col-md-12 centralize-text"style="background-color:#f8f9fa; border-color:#f8f9fa;">
                        <h2 class="mb-4">Perfil dos clientes</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Canal destaque</h5>
                                <h3 class="card-text"><?php echo $canalDestaque; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Gênero de maior retorno</h5>
                                <h3 class="card-text"><?php echo $generoDestaque; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body"style="background-color:#dde3f1; border-color:#dde3f1;">
                                <h5 class="card-title">Faixa etaria</h5>
                                <h3 class="card-text"> <?php echo $faixaMaisClientesDescricao; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
