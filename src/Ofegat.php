<?php


namespace App;


class Ofegat
{
    protected $paraula;
    protected $vocal;
    protected $letters;

    /**
     * Ofegat constructor.
     * @param $paraula
     * @param $invalidsPermesos
     */
    public function __construct($paraula)
    {
        $this->paraula = strtoupper($paraula);
        $this->letters = [];
    }

    public function addLetter(String $letter)
    {
        $letter = strtoupper($letter);
        if (in_array($letter,$this->letters)) {
            throw new \Exception('Ja la has ficada abans');
        }
        $this->letters[] = $letter;
        return (strpos($this->paraula,$letter)===false)?1:0;
    }

    public function render(){
        $fin = 1;
        for($i=0;$i<strlen($this->paraula);$i++){
            if (in_array($this->paraula[$i],$this->letters)) {
                echo $this->paraula[$i];
            }
            else {
                echo "_";
                $fin = 0;
            }
            echo " ";
        }
        return $fin;
    }

    /**
     * @return array
     */
    public function getLetters(): array
    {
        return $this->letters;
    }


}