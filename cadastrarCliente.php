<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroCLiente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!--  MENU -->
    <nav class="navbar navbar-light bg-light fixed-top">
      <div class="container-fluid">
      <a class="navbar-brand" href="cliente.php"><button type="button" class="btn btn-outline-primary">Consultar Clientes</button></a>
        <a class="navbar-brand" href="#">Cadastro De Cliente</a>
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
    <br>

<!--  Cadastro -->


    <form class="formulario" action="gravarCliente.php" method="post">

    <label class="label">Nome</label>
    <input class="old" type="text" name="cNome" placeholder="Digite o primeiro nome"><br><br>
    
    <label class="label">Sobrenome</label>
    <input class="old" type="text" name="cSobrenome" placeholder="Digite o sobrenome"><br><br>

    <label class="label">Data de aniversário</label>
    <input class="old" type="date" name="cNascimento"><br><br>

    <div>
    <label class="label">Gênero</label>
    <div class="escolha">
    <span class="radi">
        <label class="label">Ferminino</label>
        <input class="form-check-input" type="radio" name="nGenero" id="flexRadioDefault1" value="Feminino" >
    </span>
    <span class="radi">
        <label class="label">Masculino</label>
        <input class="form-check-input" type="radio" name="nGenero" id="flexRadioDefault1" value="Masculino" >
    </span>
    </div>
    </div>

    <label class="label">Celular</label>
    <input class="old" type="tel" id="nCelular" name="nCelular" placeholder="Digite o número de celular" required><br><br>
    

    <label class="label">E-mail</label>
    <input class="old" type="mail" name="cEmail" placeholder="Digite o e-mail"><br><br>

    <div>
    <label class="label">Canal</label>
    <div class="escolha">
    <span class="radi">
        <label class="label">Facebook</label>
        <input class="form-check-input" type="radio" name="nCanal" id="flexRadioDefault1" value="Facebook" >
    </span>
    <span class="radi">
        <label class="label">Instagram</label>
        <input class="form-check-input" type="radio" name="nCanal" id="flexRadioDefault1" value="Instagram">
    </span>
    <span class="radi">
        <label class="label">Site</label>
        <input class="form-check-input" type="radio" name="nCanal" id="flexRadioDefault1" value="Site">
    </span>
    <span class="radi">
        <label class="label">Buscadores</label>
        <input class="form-check-input" type="radio" name="nCanal" id="flexRadioDefault1" value="Buscadores" >
    </span>
    </div>
    </div>

    <div class="d-grid gap-2">
    <input type="submit" value="Cadastrar" name="btSalva" class="btn btn-primary"><br>
    </div>

    </form>
</body>
</html>
