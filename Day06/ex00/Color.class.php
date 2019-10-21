#!/usr/bin/php
<?php

class Color
{
    public $red;
    public $green;
    public $blue;
    public static $verbose = FALSE;

    public function __construct(array $rgbval)
    {
        if (isset($rgbval['rgb'])){
            $this->red = $rgbval['rgb'] >> 16 & 0xff;
            $this->green = $rgbval['rgb'] >> 8 & 0xff;
            $this->blue = $rgbval['rgb'] & 0xff;
        }
        else if (isset($rgbval['red']) && isset($rgbval['green']) && isset($rgbval['blue'])) {
        $this->red = intval($rgbval['red']);
        $this->green = intval($rgbval['green']);
        $this->blue = intval($rgbval['blue']);
        }
        
        if (Self::$verbose) {
           echo($this->__toString()." constructed.".PHP_EOL);
        }
    }
    
    function __destruct ()
    {
        if(Color::$verbose)
        echo ($this->__toString()." destructed.".PHP_EOL);
    }
    
    public static function doc(){
        echo file_get_contents("Color.doc.txt").PHP_EOL;
    }
    
    function add(Color $to_add)
    {
        $newr = $this->red + $to_add->red;
        $newg = $this->green + $to_add->green;
        $newb = $this->blue + $to_add->blue;

        return(new Color(array('red'=>$newr, 'green'=>$newg, 'blue'=>$newb)));
    }
    
    function sub(Color $to_add){
        $newr = $this->red - $to_add->red;
        $newg = $this->green - $to_add->green;
        $newb = $this->blue - $to_add->blue;

        return(new Color(array('red'=>$newr, 'green'=>$newg, 'blue'=>$newb)));  
    }
    
    function mult($f){
        $newr = $this->red * $f;
        $newg = $this->green * $f;
        $newb = $this->blue * $f;

        return(new Color(array('red'=>$newr, 'green'=>$newg, 'blue'=>$newb))); 
    }


    function __toString(){
        return(sprintf("Color(red:%3d, green:%3d, blue:%3d)", $this->red, $this->green, $this->blue));
    }
}

?>