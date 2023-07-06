<?php
include "conecta.php";
// Verificar se há um termo de pesquisa enviado via GET
if (isset($_GET['pesquisa'])) {
  $termo = $_GET['pesquisa'];
  $sql = "SELECT * FROM PROPRIEDADES WHERE nomePropriedade LIKE '%$termo%' OR tipo LIKE '%$termo%'";
} else {
  $sql = "SELECT * FROM PROPRIEDADES";
}

$rs = mysqli_query($conexao, $sql);
$total_registros = mysqli_num_rows($rs);

?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propriedades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<!-- MENU -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand" href="cadastrarPropriedade.php"><button type="button" class="btn btn-outline-primary">Cadastrar</button></a>
          <a class="navbar-brand" href="#">Propriedades</a>
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
                  <a class="nav-link" href="oportunidades.php">Oportunidades</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <br>
    <br>
    <br>
<!-- CONTEUDO -->

    <?php
    // Verificar se há uma mensagem de sucesso na URL
    if (isset($_GET['mensagem'])) {
        $mensagem = $_GET['mensagem'];
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $mensagem; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
   <br>
   <br>
    <div class="container">
        <form action="propriedades.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquisar por nome ou tipo de propriedades" name="pesquisa">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">tipo</th>
                        <th scope="col">valor</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php while ($reg = mysqli_fetch_array($rs)) {
                    $id = $reg["idPropriedades"];
                    $nome = $reg["nomePropriedade"];
                    $tipo = $reg["tipo"];
                    $valor = $reg["valor"];
                    $localidade = $reg["localidade"];
                    ?>
                    <tr class="">
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $tipo; ?></td>
                        <td><?php echo $valor; ?></td>
                        <td>
                            <a class="navbar-brand" href="editarPropriedade.php?id=<?php echo $id; ?>"><button class="btn btn-outline-primary" type="button">Editar</button></a>
                            <a class="navbar-brand" href="DeletarPropriedade.php?id=<?php echo $id; ?>"><button class="btn btn-outline-danger" type="button">Excluir</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>
</html>
