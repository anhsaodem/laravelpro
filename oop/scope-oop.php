<?php

class Demo {
    public $attr1;
    private $attr2;
    private function show(){
        return $this->attr1;
    }
}

$a = new Demo;
$a->attr1 = 10;
echo $a->attr1;