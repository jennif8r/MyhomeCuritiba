<?php
$txtConteudo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($txtConteudo["cNome"])) {
    $id = $txtConteudo["id"];
    $nome = $txtConteudo["cNome"];
    $fase = $txtConteudo["cFase"];
    $cliente = $txtConteudo["cCliente"];
    $propriedades = $txtConteudo["cPropriedade"];
    } else {
    echo 'Não foi alterado';
    echo '<meta http-equiv="refresh" content="2; URL=alteraOportunidade.php"/>';
}

include "conecta.php";
$sql = "UPDATE OPORTUNIDADES SET ";
$sql .= " nomeOportunidade = '$nome',";
$sql .= " fase	 = '$fase',";
$sql .= " fkCliente  = '$cliente',";
$sql .= " fkPropriedades  = '$propriedades'";
$sql .= " WHERE idOportunidades  = '$id'";

$rs = mysqli_query($conexao, $sql);
if (!$rs) {
    echo 'Problemas na gravação!';
    echo '<meta http-equiv="refresh" content="10; URL=editarOportunidade.php"/>';
    return;
}

mysqli_close($conexao);

// Redirecionar para a página cliente.php com a mensagem de sucesso
$mensagem = urlencode('Alteração efetuada com sucesso');
$redirectUrl = "Oportunidades.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>
