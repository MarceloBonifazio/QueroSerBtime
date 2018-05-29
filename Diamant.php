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

class Diamant
{

    private $alphabet;

    private $internalSpacing;

    private $externalSpacing;

    private $letter;

    /**
     * Create a new AdminController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->alphabet = "abcdefghijklmnopqrstuvwxyz";
        $this->internalSpacing = 0;
        $this->externalSpacing = 0;
        $this->letter = '';
    }
    
    private function setExternalSpacing()
    {
      $this->externalSpacing = $this->getDistance()+1;
    }

    private function getDistance()
    {
      return strpos($this->alphabet, $this->letter);
    }
    
    public function print()
    {
      $this->setExternalSpacing();
      echo $this->internalSpacing." ".$this->externalSpacing."\n";
      for($x = 0; $x <= $this->getDistance(); $x++)
      {
        if($this->internalSpacing == 0){
          for($y = $this->externalSpacing; $y > 0; $y--)
          {
            echo " ";
          }
        }else{
          for($y = $this->externalSpacing; $y > 0; $y--)
          {
            echo " ";
          }
          echo $this->alphabet[$x];
        }
        for($y = $this->internalSpacing; $y > 0; $y--)
        {
          echo "  ";
        }
        echo $this->alphabet[$x]."\n";
        $this->internalSpacing++;
        $this->externalSpacing--;
      }
      $x -= 2;
      $this->internalSpacing-= 2;
      for($x; $x >= 0; $x--)
      {
        if($this->internalSpacing == 0){
          for($y = $this->externalSpacing; $y > 0; $y--)
          {
            echo " ";
          }
        }else{
          for($y = $this->externalSpacing; $y > 0; $y--)
          {
            echo " ";
          }
          echo $this->alphabet[$x];
        }
        for($y = $this->internalSpacing*2; $y > 0; $y--)
        {
          echo " ";
        }
        echo $this->alphabet[$x]."\n";
        $this->internalSpacing--;
        $this->externalSpacing++;
      }
    }
    
    public function setLetter($letter = '')
    {
        $this->letter = $letter;        
    }
    
    public function getLetter()
    {
        return $this->letter;
    }
    
}

$a = new Diamant;
$a->setLetter('a');
echo $a->print();


?>
