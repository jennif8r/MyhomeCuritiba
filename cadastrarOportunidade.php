<!DOCTYPE html>
<html lang="pt">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroOportunidade</title>
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
<br>
<br>
<br>

<!--  Cadastro -->
<form class="formulario" action="gravarOportunidade.php" method="post">

    <label class="label">Nome da oportunidade</label>
    <input class="old" type="text" name="cNome" placeholder="Digite o nome da oportunidade">

    <label class="label">Fase da oportunidade</label>
    <div class="form-floating">
        <select class="form-select" name="cFase" id="floatingSelect" aria-label="Floating label select example">
            <option selected disabled>Selecione a fase da oportunidade</option>
            <option value="Contato feito">Contato feito</option>
            <option value="Apresentação">Apresentação</option>
            <option value="Proposta enviada">Proposta enviada</option>
            <option value="Fechado e ganho">Fechado e ganho</option>
            <option value="Fechado e Perdido">Fechado e Perdido</option>
        </select>
        <label for="floatingSelect">Fase selecionada</label>
    </div>
    <br>
    <label class="label">Data da criação</label>
    <input class="old" type="date" id="cData" name="cData" placeholder="Digite o valor do imóvel" required>
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
        while ($cliente = mysqli_fetch_assoc($consultaClientes)) {
            echo "<option value='" . $cliente['idclientes'] . "'>" . $cliente['nome'] . " " . $cliente['sobrenome'] . "</option>";
        }
        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);
        ?>
    </select>
    <Br></Br>
    <!--  Propriedade: -->
    <form class="Propriedade">
    <label class="label">Selecione a propriedade</label>
    <select class="form-select" name="cPropriedade" aria-label="Selecione a propriedade">
    <?php
        // Conexão com o banco de dados
        include "conecta.php";

        // Verificar se a conexão foi estabelecida com sucesso
        if (mysqli_connect_errno()) {
            echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
            exit();
        }

        // Consultar os clientes no banco de dados
        $consultaPropriedades = mysqli_query($conexao, "SELECT idPropriedades  , nomePropriedade, tipo, valor	, localidade FROM PROPRIEDADES");

        // Exibir as opções do campo de seleção
        while ($Propriedades = mysqli_fetch_assoc($consultaPropriedades)) {
            echo "<option value='" . $Propriedades['idPropriedades'] . "'>" . $Propriedades['nomePropriedade'] . " " . $Propriedades['tipo'] . "</option>";
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);
        ?>
    </select>
    <br>
    <br>
    <div class="d-grid gap-2">
        <input type="submit" value="Cadastrar" name="btSalva" class="btn btn-primary"><br>
    </div>
</form>
</body>
</html>
