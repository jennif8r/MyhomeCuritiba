<?php
$nome = $_POST['cNome'];
$sobrenome = $_POST['cSobrenome'];
$nascimento = $_POST['cNascimento'];
$genero = $_POST['nGenero'];
$celular = $_POST['nCelular'];
$email = $_POST['cEmail'];
$canal = $_POST['nCanal'];

//linha que fará a conexão 
include "conecta.php";
//comando para inserir os dados na tabela
$sql = "INSERT INTO CLIENTES";
$sql = $sql."(NOME,SOBRENOME,NASCIMENTO,GENERO,CELULAR,EMAIL,CANAL)";
$sql = $sql."VALUES (";
$sql = $sql." '".$nome."',";
$sql = $sql." '".$sobrenome."',";
$sql = $sql." '".$nascimento."',";
$sql = $sql." '".$genero."',";
$sql = $sql." '".$celular."',";
$sql = $sql." '".$email."',";
$sql = $sql." '".$canal."')";

$rs = mysqli_query($conexao,$sql);
if(!$rs){
    echo $sql;
    echo 'PROBLEMAS NA GRAVAÇÃO';
    echo '<meta http-equiva="refresh" content="10";URL=cadastrarCliente.php/>';
    return;
}
mysqli_close($conexao);
$mensagem = urlencode('Cliente cadastrado com sucesso');
$redirectUrl = "cliente.php?mensagem=$mensagem";
header("Location: $redirectUrl");
exit;
?>