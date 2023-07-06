<?php
$txtConteudo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($txtConteudo["cNome"])) {
    $id = $txtConteudo["id"];
    $nome = $txtConteudo["cNome"];
    $tipo = $txtConteudo["cTipo"];
    $valor = $txtConteudo["cValor"];
    $localidade = $txtConteudo["cLocalidade"];
    } else {
    echo 'Não foi alterado';
    echo '<meta http-equiv="refresh" content="2; URL=alteraPropriedade.php"/>';
}

include "conecta.php";
$sql = "UPDATE PROPRIEDADES SET ";
$sql .= " nomePropriedade = '$nome',";
$sql .= " tipo	 = '$tipo',";
$sql .= " valor = '$valor',";
$sql .= " localidade = '$localidade'";
$sql .= " WHERE idPropriedades = '$id'";

$rs = mysqli_query($conexao, $sql);
if (!$rs) {
    echo 'Problemas na gravação!';
    echo '<meta http-equiv="refresh" content="10; URL=editarPropriedade.php"/>';
    return;
}

mysqli_close($conexao);

// Redirecionar para a página cliente.php com a mensagem de sucesso
$mensagem = urlencode('Alteração efetuada com sucesso');
$redirectUrl = "propriedades.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>
