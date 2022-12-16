Sorteio ISGH
=======

Aplicação simples para sortear um nome de uma lista de nomes, construída em PHP, jQuery e Bootstrap. Permite obter uma string aleatória de uma lista separada por quebras de linha.

versão online, acesse aqui: [https://sorteio-isgh.000webhostapp.com/].

## Uso

1 - Informar uma lista de nomes, cada nome em uma linha.
2 - Clicar no botão "Sortear", um dos nomes será escolhido aleatoriamente. 

OBS.: Os nomes sorteados são armazenados em um array Javascript, e são enviados por POST no momento que o botão é clicado, os nomes sorteados serão excluídos através da função **array_diff**, garantindo que cada nome seja sorteado apenas uma vez.

## Implementar no Futuro

* Melhorar a responsividade da página;
* Armazenar os nomes sorteados no banco de dados ao invés de um array;
* Armazenar os prêmios que serão sorteados.
