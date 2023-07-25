<?php

use Rectangle as GlobalRectangle;

class Rectangle
{
    public static $height;
    public static $width;
    //Phuong thuc
    public static function getPerimeter()
    {
        return 2 * (self::$height + self::$width);
    }
    public static function getAria()
    {
        return self::$height * self::$width;
    }
}

// Rectangle::$height = 10;
// Rectangle::$width =40;
// echo Rectangle::getPerimeter();
class Demo
{
    public function __construct()
    {
        Rectangle::$height = 20;
        Rectangle::$width = 15;
        echo 'Chu vi hinh chu nhat la:';
        echo '<br/>';
        echo Rectangle::getPerimeter();
    }
}

$a = new Demo();
