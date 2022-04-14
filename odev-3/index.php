<?php
class Sekil
{
    public $a, $b,$c, $h;
    public function __construct($a, $b= null , $c = null, $h = null)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->h = $h;
    }
}

class Kare extends Sekil
{
    public function cevre()
    {
        return $this->a * 4;
    }
    public function alan()
    {
        return $this->a * $this->a;
    }
}

class Dikdortgen extends Sekil
{
    public function cevre()
    {
        return $this->a * 2 + $this->b * 2;
    }
    public function alan()
    {
        return $this->a * $this->b;
    }
}

class Ucgen extends Sekil
{
    public function cevre()
    {
        return $this->a + $this->b + $this->c;
    }
    public function alan()
    {
       return ($this->a*$this->b)/2;
    }
}

$kare = new Kare(3);
$dikdortgen = new Dikdortgen(5,7);
$ucgen = new Ucgen(5,9,7);

echo "Kare Çevresi: " . $kare->cevre();
echo "<br/>";
echo "Kare Alanı: " . $kare->alan();
echo  "<br/>";
echo "Dikdortgen Çevresi: " . $dikdortgen->cevre();
echo "<br/>";
echo "Dikdortgen Alanı: " . $dikdortgen->alan();
echo  "<br/>";
echo "Ucgen Çevresi: " . $ucgen->cevre();
echo "<br/>";
echo "Ucgen Alanı: " . $ucgen->alan();
echo  "<br/>";
?>
