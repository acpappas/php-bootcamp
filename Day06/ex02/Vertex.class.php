#!/usr/bin/php
<?php
require_once './Color.class.php';

class Vertex
{
    private $_x = 0.00;
    private $_y = 0.00;
    private $_z = 0.00;
    private $_w = 1.00;
    private $_color;

    public static $verbose = FALSE;

    public function __construct(array $ver){

        $this->_color = new Color(array('rgb' => 0xffffff));
        $this->_x = $ver['x'];
        $this->_y = $ver['y'];
        $this->_z = $ver['z'];

        if (isset($ver['w'])){
            $this->_w = $ver['w'];
        }

        if (isset($ver['color']))
        {
            $this->_color = $ver['color'];
        }

        if (Self::$verbose) {
            echo($this->__toString()." constructed.".PHP_EOL);
         }

    }

    public static function doc() {
        echo file_get_contents("Vertex.doc.txt").PHP_EOL;
    }

    public function rx()
    {
        return ($this->_x);
    }

    public function ry()
    {
        return ($this->_y);
    }

    public function rz()
    {
        return ($this->_z);
    }

    public function rw()
    {
        return ($this->_w);
    }

    public function rcolor()
    {
        return ($this->_color);
    }

    public function rred()
    {
        return ($this->_color->red());
    }

    public function rgreen()
    {
        return ($this->_color->green());
    }

    public function rblue()
    {
        return ($this->_color->blue());
    }

    public function wx($x)
    {
        $this->_x = $x;
    }

    public function wy($y)
    {
        $this->_y = $y;
    }

    public function wz($z)
    {
        $this->_z = $z;
    }

    public function ww($w)
    {
        $this->_w = $w;
    }

    public function wcolor($color)
    {
        $this->_color = $color;
    }


    function __destruct(){
        
        if(Self::$verbose){
            echo ($this->__toString()." destructed".PHP_EOL);
        }
    }

    function __toString(){
        if(Self::$verbose)
        {
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )",$this->_x, $this->_y,$this->_z, $this->_w, $this->_color));
        }
        else
        return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",$this->_x, $this->_y,$this->_z, $this->_w));
    }
}

?>