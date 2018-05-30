<?php

/*
  Este problema foi utilizado em 133 Dojo(s).

  Dado uma letra ('A' a 'Z'), exiba um diamante iniciando em 'A' e tendo a letra fornecida com o ponto mais distante.

  Por exemplo, dado a letra 'E' temos:

      A   

     B B

    C   C

   D     D

  E       E 

   D     D 

    C   C

     B B

      A



  Dado a letra 'C' temos:

    A

   B B

  C   C

   B B

    A  
*/

class Diamond
{
  /** @var string representação do diamante */
  private $diamond = "";

  /**
    * Cria uma nova instância da classe Diamond.
    */
  public function __construct()
  {
    $this->alphabet = strtoupper("abcdefghijklmnopqrstuvwxyz");
    $this->mode = php_sapi_name();
    $this->setSymbols();
    $this->internalSpacing = 1;
    $this->externalSpacing = 0;
  }

  /**
    * Cria um log com as informações passadas
  */
  private function log($text)
  {
    file_put_contents('log.txt', $text.PHP_EOL , FILE_APPEND | LOCK_EX);
  }

  /**
    * Atribui qual é o espaço inicial da área externa do diamante, levando em consideração a quantidade de letras que irão ser usadas
    exp: "A distância" entre A e B é 1, portanto a distância da primeira linha será de 1.
    */
  private function setExternalSpacing()
  {
    $this->externalSpacing = $this->getDistance();
  }
	
  /**
    * Atribui quais simbolos deveram ser usados para melhor representação visual, se cli, o melhor visualmente é \n para quebra de linha e " " para espaçamento de caracteres.
    Já em um navegador(servidor) o melhor visualmente é <br/> para quebra de linha e &nbsp; para espaçamento de caracteres.
    */
	private function setSymbols()
  {
    if($this->mode === "cli")
    {
      $this->lineBreakSymbol = "\n";
      $this->spaceSymbol = " ";
    }else{
      $this->lineBreakSymbol = "<br/>";
      $this->spaceSymbol = "&nbsp;";
    }
  }

  /**
    * Pega qual a distancia entre a letra desejada e o início do alfabeto
    */
  private function getDistance()
  {
    return strpos($this->alphabet, $this->letter);
  }
  
  /**
    * Atribui a linha atual, se o espaço interno for 1, a letra não se repetirá, pois é a primeira, para a construção da linha se utiliza das váriaveis $this->spaceSymbol, $this->lineBreakSymbol, $this->externalSpacing, $this->internalSpacing e da letra atual $letter
    */
  private function setLine(){
    if($this->internalSpacing === 1)
    {
      $this->line = str_repeat($this->spaceSymbol, $this->externalSpacing);
      $this->line .= $this->getLetter();
      $this->line .= str_repeat($this->spaceSymbol, $this->externalSpacing);
      $this->line .= $this->lineBreakSymbol;
    }else{
      $this->line = str_repeat($this->spaceSymbol, $this->externalSpacing);
      $this->line .= $this->getLetter();
      $this->line .= str_repeat($this->spaceSymbol, $this->internalSpacing-2);
      $this->line .= $this->getLetter();
      $this->line .= $this->lineBreakSymbol;
    }
  }

  /**
    * @return A linha atual 
    */
  private function getLine(){
    return $this->line;
  }
  
  /**
    * @return A letra atual 
    */
  private function getLetter(){
    return $this->letter;
  }

  /**
    * Atribui a letra, se a letra não vier setada, pega uma letra do alfabeto
    */
  private function setLetter($letter)
  {
    if($letter === true)
    {
      $letter = $this->alphabet[rand(0,strlen($this->alphabet)-1)];
    }
    $this->letter = strtoupper($letter);        
  }

  /**
    * Constroi o diamante, setando o espaço externo inicial e pegando a distancia entre as letras para rodar o primeiro for, o primeiro for é encarregado de montar a parte de cima do diamante, o segundo for percorre o caminho inverso
    */
  private function buildDiamond()
  {
    $this->setExternalSpacing();
    $distance = $this->getDistance();
    for($x = 0; $x < $distance; $x++)
    {
      $this->log(
        $this->getLetter()." ".$this->internalSpacing." ".$this->externalSpacing
      );
      $this->setLetter($this->alphabet[$x]);
      $this->setLine();
      $this->diamond .= $this->getLine();
      $this->internalSpacing+=2;
      $this->externalSpacing--;
    }
    for($x; $x >= 0; $x--)
    {
      $this->log(
        $this->getLetter()." ".$this->internalSpacing." ".$this->externalSpacing
      );
      $this->setLetter($this->alphabet[$x]);
      $this->setLine();
      $this->diamond .= $this->getLine();
      $this->internalSpacing-=2;
      $this->externalSpacing++;
    }
	$this->log("\n");
  }

  /**
   * Seta a letra inicial para o calculo da Distância, constrói o diamante.

   @return a string $this->diamond com o diamante montado
  */
  public function print($letter){
    $this->setLetter($letter);
    $this->buildDiamond();
    return $this->diamond;
  }

}

$a = new Diamond;
/**
  * Se executado em linha de código, o programa pega o argumento, caso contrário pega outra letra qualquer dentro do alfabeto
*/
echo $a->print( empty($argv[1]) ? true : $argv[1] );

?>