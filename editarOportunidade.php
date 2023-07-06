<?php
include "conecta.php";
$txtConteudo = filter_input_array(INPUT_GET, FILTER_DEFAULT);
if (isset($txtConteudo["id"])) {
    $varId = $txtConteudo["id"];
    //comando para buscar os dados do id respectivo
    $sql = "SELECT * FROM OPORTUNIDADES ";
    $sql .= " WHERE idOportunidades = '" . $varId . "'";
    //executa o comando e coloca o resultado na var rs
    $rs = mysqli_query($conexao, $sql);
    $reg = mysqli_fetch_array($rs);
    $id = $reg["idOportunidades"];
    $nome = $reg["nomeOportunidade"];
    $fase = $reg["fase"];
    $cliente = $reg["fkCliente"];
    $propriedades = $reg["fkPropriedades"];
} else {
    echo "REGISTRO NÃO LOCALIZADO";
    echo "<meta HTTP-EQUIV='Refresh' content='5; 
            URL=oportunidades.php' />";
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditarPropriedade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<!--MENU -->
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="oportunidades.php"><button type="button" class="btn btn-outline-primary">Consultar oportunidades</button></a>
        <a class="navbar-brand" href="#">Cadastro De Oportunidade</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">
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
                </ul>
            </div>
        </div>
    </div>
</nav>
<!--  Cadastro -->
    <br>
    <form class="formulario" action="alteraOportunidade.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label class="label">Nome da oportunidade</label>
        <input class="old" type="text" name="cNome" value="<?php echo $nome ?>"><br>

        <label class="label">Fase da oportunidade</label>
        <div class="form-floating">
            <select class="form-select" name="cFase" id="floatingSelect" aria-label="Floating label select example">
                <option value="">Selecione a fase da oportunidade</option>
                <option value="Contato feito" <?php if ($fase == 'Contato feito') echo 'selected'; ?>>Contato feito</option>
                <option value="Apresentação" <?php if ($fase == 'Apresentação') echo 'selected'; ?>>Apresentação</option>
                <option value="Proposta enviada" <?php if ($fase == 'Proposta enviada') echo 'selected'; ?>>Proposta enviada</option>
                <option value="Fechado e ganho" <?php if ($fase == 'Fechado e ganho') echo 'selected'; ?>>Fechado e ganho</option>
                <option value="Fechado e Perdido" <?php if ($fase == 'Fechado e Perdido') echo 'selected'; ?>>Fechado e Perdido</option>
            </select>
            <label for="floatingSelect">Fase selecionada</label>
        </div>
        <br>

        <!--  Cliente: -->
        <label class="label">Cliente</label>
        <select class="form-select" name="cCliente" aria-label="Selecione o cliente">
            <?php
            include "conecta.php";
            if (mysqli_connect_errno()) {
                echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
                exit();
            }
            $consultaClientes = mysqli_query($conexao, "SELECT idclientes , nome, sobrenome, nascimento, genero, celular, email, canal FROM CLIENTES");
            while ($row = mysqli_fetch_assoc($consultaClientes)) {
                $selected = ($row['idclientes'] == $cliente) ? 'selected' : '';
                echo "<option value='" . $row['idclientes'] . "' $selected>" . $row['nome'] . " " . $row['sobrenome'] . "</option>";
            }
            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </select>
        <br><br>
        <!--  Propriedade: -->
        <label class="label">Propriedade</label>
        <select class="form-select" name="cPropriedade" aria-label="Selecione a propriedade">
            <?php
            include "conecta.php";
            if (mysqli_connect_errno()) {
                echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
                exit();
            }
            $consultaPropriedade = mysqli_query($conexao, "SELECT idPropriedades , nomePropriedade, tipo, valor, localidade FROM PROPRIEDADES");
            while ($row = mysqli_fetch_assoc($consultaPropriedade)) {
                $selected = ($row['idPropriedades'] == $propriedades) ? 'selected' : '';
                echo "<option value='" . $row['idPropriedades'] . "' $selected>" . $row['nomePropriedade'] . " " . $row['tipo'] . "</option>";
            }
            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
            ?>
        </select>
        <br>
        <div class="d-grid gap-2">
            <input type="submit" value="Editar" name="btSalva" class="btn btn-primary">
            <input value="Cancelar" class="btn btn-danger" onclick="window.location.href='oportunidades.php'"><br>
        </div>
    </form>
</body>

</html>
