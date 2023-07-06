<?php
$nome = $_POST['cNome'];
$fase = $_POST['cFase'];
$data = $_POST['cData'];
$cliente = $_POST['cCliente'];
$propriedades = $_POST['cPropriedade'];

//linha que fará a conexão 
include "conecta.php";
//comando para inserir os dados na tabela
$sql = "INSERT INTO OPORTUNIDADES";
$sql .= "(nomeOportunidade,fase,dataCriacao,fkCliente,fkPropriedades)";
$sql .= " VALUES (";
$sql .= " '".$nome."',";
$sql .= " '".$fase."',";
$sql .= " '".$data."',";
$sql .= " '".$cliente."',";
$sql .= " '".$propriedades."')";

$rs = mysqli_query($conexao, $sql);
if (!$rs) {
    echo $sql;
    echo 'PROBLEMAS NA GRAVAÇÃO';
    echo '<meta http-equiv="refresh" content="10;URL=cadastrarOportunidade.php"/>';
    return;
}
mysqli_close($conexao);
$mensagem = ('Oportunidade cadastrada com sucesso');
$redirectUrl = "oportunidades.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>