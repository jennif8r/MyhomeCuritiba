<?php
$nome = $_POST['cNome'];
$tipo = $_POST['cTipo'];
$valor = $_POST['cValor'];
$localidade = $_POST['cLocalidade'];

//linha que fará a conexão 
include "conecta.php";
//comando para inserir os dados na tabela
$sql = "INSERT INTO PROPRIEDADES";
$sql .= "(NOMEPROPRIEDADE,TIPO,VALOR,LOCALIDADE)";
$sql .= " VALUES (";
$sql .= " '".$nome."',";
$sql .= " '".$tipo."',";
$sql .= " '".$valor."',";
$sql .= " '".$localidade."')";

$rs = mysqli_query($conexao, $sql);
if (!$rs) {
    echo $sql;
    echo 'PROBLEMAS NA GRAVAÇÃO';
    echo '<meta http-equiv="refresh" content="10;URL=cadastrarPropriedade.php"/>';
    return;
}
mysqli_close($conexao);
$mensagem = ('Propriedade cadastrada com sucesso');
$redirectUrl = "propriedades.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>
