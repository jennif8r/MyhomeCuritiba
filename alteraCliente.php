<?php
$txtConteudo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($txtConteudo["cNome"])) {
    $id = $txtConteudo["id"];
    $nome = $txtConteudo["cNome"];
    $sobrenome = $txtConteudo["cSobrenome"];
    $nascimento = $txtConteudo["cNascimento"];
    $genero = $txtConteudo["nGenero"];
    $celular = $txtConteudo["nCelular"];
    $email = $txtConteudo["cEmail"];
    $canal = $txtConteudo["nCanal"];
} else {
    echo 'Não foi alterado';
    echo '<meta http-equiv="refresh" content="2; URL=alteraCliente.php"/>';
}

include "conecta.php";
$sql = "UPDATE CLIENTES SET ";
$sql .= " NOME = '$nome',";
$sql .= " SOBRENOME = '$sobrenome',";
$sql .= " NASCIMENTO = '$nascimento',";
$sql .= " GENERO = '$genero',";
$sql .= " CELULAR = '$celular',";
$sql .= " EMAIL = '$email',";
$sql .= " CANAL = '$canal'";
$sql .= " WHERE IDCLIENTES = '$id'";

$rs = mysqli_query($conexao, $sql);
if (!$rs) {
    echo 'Problemas na gravação!';
    echo '<meta http-equiv="refresh" content="10; URL=editarCliente.php"/>';
    return;
}

mysqli_close($conexao);

// Redirecionar para a página cliente.php com a mensagem de sucesso
$mensagem = urlencode('Alteração efetuada com sucesso');
$redirectUrl = "cliente.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>
