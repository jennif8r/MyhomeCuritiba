<!DOCTYPE html>
<html lang="pt">
<<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroPropriedade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!--  MENU -->
     <nav class="navbar navbar-light bg-light fixed-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="propriedades.php"><button type="button" class="btn btn-outline-primary">Consultar Propriedades</button></a>
        <a class="navbar-brand" href="#">Propriedade</a>
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

<!--  Cadastro -->

    <form class="formulario" action="gravarPropriedade.php" method="post">

    <label class="label">Nome da propriedade</label>
    <input class="old" type="text" name="cNome" placeholder="Digite o nome da propriedade"><br><br>
    <div>

    <label class="label">Tipo de Imóvel</label>
    <div class="escolha">
    <span class="radi">
        <label class="label">Terreno</label>
        <input class="form-check-input" type="radio" name="cTipo" id="flexRadioDefault1" value="Terreno" >
    </span>
    <span class="radi">
        <label class="label">Casa</label>
        <input class="form-check-input" type="radio" name="cTipo" id="flexRadioDefault1" value="Casa" >
    </span>
    <span class="radi">
        <label class="label">Apartamento</label>
        <input class="form-check-input" type="radio" name="cTipo" id="flexRadioDefault1" value="Apartamento" >
    </span>
    </div>
    </div>
    
    <label class="label">Valor</label>
    <input class="old" type="text" id="cValor" name="cValor" placeholder="Digite o valor do imóvel" required>
    
  <script src="formatacao.js"></script>  

    <label class="label">Localidade</label>
    <input class="old" type="text" name="cLocalidade" placeholder="Digite o endereço do imóvel"><br><br>

    </div>
    </div>

    <div class="d-grid gap-2">
    <input type="submit" value="Cadastrar" name="btSalva" class="btn btn-primary"><br>
    </div>

    </form>
</body>
</html>