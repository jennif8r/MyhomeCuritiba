<?php
include "conecta.php";
$txtConteudo = filter_input_array(INPUT_GET,FILTER_DEFAULT);
if(isset($txtConteudo["id"])){
    $varId = $txtConteudo["id"];
    //comando para buscar os dados do id respectivo
    $sql = "SELECT * FROM PROPRIEDADES ";
    $sql = $sql." WHERE idPropriedades = '".$varId."'";
    //executa o comando e coloca o resultado na var rs
    $rs = mysqli_query($conexao,$sql);
    $reg = mysqli_fetch_array($rs);

    $id = $reg["idPropriedades"];
    $nome = $reg["nomePropriedade"];
    $tipo = $reg["tipo"];
    $valor = $reg["valor"];
    $localidade = $reg["localidade"];
}else{
   echo "REGISTRO NÃO LOCALIZADO" ;
   ECHO "<meta HTTP-EQUIV='Refresh' content='5; 
            URL=propriedades.php' />";
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
<!--  MENU -->
<nav class="navbar navbar-light bg-light fixed-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="propriedades.php"><button type="button" class="btn btn-outline-primary">Consultar Propriedades</button></a>
        <a class="navbar-brand" href="#">Edição De Propriedade</a>
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
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <br>
    <!--  conteudo -->
    <br>
    <br>
   <form class="formulario" action="alteraPropriedade.php" method="post">
        <input type="hidden" name="id" value="<?php print $id ?>">

        <label class="label">Nome</label>
        <input class="old" type="text" name="cNome" value="<?php print $nome ?>"><br><br>

        <div>
            <label class="label">Tipo de imóvel</label>
            <div class="escolha">
                <span class="radi">
                    <label class="label">Terreno</label>
                    <input class="form-check-input" type="radio" name="cTipo" value="Terreno" <?php if ($tipo == "Terreno") echo "checked"; ?>>
                </span>
                <span class="radi">
                    <label class="label">Casa</label>
                    <input class="form-check-input" type="radio" name="cTipo" value="Casa" <?php if ($tipo == "Casa") echo "checked"; ?>>
                </span>
                <span class="radi">
                    <label class="label">Apartamento</label>
                    <input class="form-check-input" type="radio" name="cTipo" value="Apartamento" <?php if ($tipo == "Apartamento") echo "checked"; ?>>
                </span>
            </div>
        </div>

        <label class="label">Valor do imóvel</label>
        <input class="old" type="text" id="cValor" name="cValor" placeholder="Digite o valor do imóvel" value="<?php print $valor ?>" required><br><br>
        <script src="formatacao.js"></script>  

        <label class="label">Localidade</label>
        <input class="old" type="text" name="cLocalidade" placeholder="Digite a localidade" value="<?php print $localidade ?>"><br><br>

        </div>

        <div class="d-grid gap-2">
            <input type="submit" value="Editar" name="btSalva" class="btn btn-primary"><br>
            <input value="Cancelar" class="btn btn-danger" onclick="window.location.href='propriedades.php'"><br>
        </div>
    </form>
</body>
</html>
