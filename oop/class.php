<?php
class Rectangle{
    public $height;
    public $width;
    //Phuong thuc
    public function __construct()
    {
        $this->height = 100;
        $this->width = 5;
    }
    public function getPerimeter()
    {
        return 2 * ($this->height + $this->height);
    }
    public function getAria()
    {
        return $this->height * $this->width;
    }
}

$a = new Rectangle();
echo $a->getPerimeter();
echo '<br/>';
echo $a->getAria();
