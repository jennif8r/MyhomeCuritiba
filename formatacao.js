// Obtém uma referência para o elemento input
var input = document.getElementById("cValor");

// Adiciona um ouvinte de evento para capturar a entrada do teclado
input.addEventListener("keyup", function(event) {
  // Obtém o valor atual do input
  var valor = event.target.value;

  // Remove todos os caracteres que não são dígitos
  valor = valor.replace(/\D/g, '');

  // Formata o valor para o formato de moeda desejado
  var valorFormatado = (parseInt(valor) / 100).toFixed(2);

  // Atualiza o valor do input com a versão formatada
  event.target.value = valorFormatado;
});
