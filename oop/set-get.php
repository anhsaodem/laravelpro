<?php
class Demo{
    public $attr1;
    public function getValue(){
        return $this->attr1;
    }
    public function setValue($value){
        $this->attr1 = $value;
    }
}