# Quero ser Btime!

Projeto de um teste aleatório retirado de [DojoPuzzle Diamantes](http://dojopuzzles.com/problemas/exibe/diamantes/)

## Descrição do teste

Dado uma letra ('A' a 'Z'), exiba um diamante iniciando em 'A' e tendo a letra fornecida com o ponto mais distante.

Por exemplo, dado a letra 'E' temos:

```
    A   

   B B

  C   C

 D     D

E       E 

 D     D 

  C   C

   B B

    A
```
 

Dado a letra 'C' temos:

```
  A

 B B

C   C

 B B

  A
```

Traduzido de: http://www.cyber-dojo.com/

## Executando a classe

Para a execução da classe é necessário uma instalação prévia do php7+

1. Baixe o repositório via linha de comando, [zip](https://github.com/MarceloBonifazio/QueroSerBtime/archive/master.zip) ou Client Git.
   1. Linha de comando
      1. ``git clone https://github.com/MarceloBonifazio/QueroSerBtime folder-name``
   1. Zip
      1. Baixe e descompacte a pasta aonde deseja executar a classe
1. Para executar a classe em linha de comando, basta acessar a raiz do projeto e digitar
   1. Linha de comando ``php Diamond.php <argv>`` onde ``<argv>`` é a letra do ponto mais distante, caso o argumento não seja passado, será escolhida uma letra aleatória do alfabeto
1. O código também pode ser visto funcionando em: [repl.it](https://repl.it/@marcelobonifazio/SadAmusingSites)
