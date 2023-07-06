<?php
include "conecta.php";
$txtConteudo = filter_input_array(INPUT_GET,FILTER_DEFAULT);
if(isset($txtConteudo["id"])){
    $varId = $txtConteudo["id"];
    //comando para buscar os dados do id respectivo
    $sql = "SELECT * FROM CLIENTES ";
    $sql = $sql." WHERE idclientes  = '".$varId."'";
    //executa o comando e coloca o resultado na var rs
    $rs = mysqli_query($conexao,$sql);
    $reg = mysqli_fetch_array($rs);

    $id = $reg["idclientes"];
    $nome = $reg["nome"];
    $sobrenome = $reg["sobrenome"];
    $nascimento = $reg["nascimento"];
    $genero = $reg["genero"];
    $celular = $reg["celular"];
    $email = $reg["email"];
    $canal = $reg["canal"];
}else{
   echo "REGISTRO NÃO LOCALIZADO" ;
   ECHO "<meta HTTP-EQUIV='Refresh' content='5; 
            URL=cliente.php' />";
}
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>excluirCliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<form class="formulario" action="excluirCliente.php" method="post">
        <input type="hidden" name="id" value="<?php print $id ?>">

        
        <label class="label"style="color: #f1f1f1; text-align: center;">Deseja Realmente Deletar o Cliente<p style="color: #c80d0d; text-align: center;"><?php print $nome ?> <?php print $sobrenome ?></p></label>
        <br>
            <br>
            <br>
        <div class="d-grid gap-2">
            <input type="submit" value="Excluir" name="btSalva" class="btn btn-danger">
            <input value="Cancelar" class="btn btn-primary" onclick="window.location.href='cliente.php'"><br>
        </div>
    </form>
</body>
</html>