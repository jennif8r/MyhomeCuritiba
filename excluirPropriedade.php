<?php
include "conecta.php";
$txtConteudo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(isset($txtConteudo["id"])){
    $varId = $txtConteudo["id"];
    $sql = "DELETE FROM PROPRIEDADES ";
    $sql = $sql."WHERE idPropriedades = '".$varId."'";

    $rs = mysqli_query($conexao,$sql);
    if ($rs){
        print "Dados excluídos com sucesso!";
    }else{
        print "Exclusão não executada!";
    }
    mysqli_close($conexao);
    $mensagem = urlencode('Exclusão de propriedade efetuada com sucesso');
    $redirectUrl = "propriedades.php?mensagem=$mensagem";
    header("Location: $redirectUrl");
    exit;
}else{
    print "Exclusão não executada, verifique!!";
}
?>