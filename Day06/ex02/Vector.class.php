#!/usr/bin/php
<?php
require_once "./Vertex.class.php";

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;

    private $_dest;
    private $_orig;
    public static $verbose = FALSE;

	public function __construct(array $vec)
	{
		$this->_dest = $vec["dest"];
        
        if(!isset($vec['orig'])){
			$vec['orig'] = new Vertex(array("x"=>0.0, "y"=>0.0, "z"=>0.0));
		}
		else {
			$this->_orig = $vec['orig'];
		}
		$this->_x = $this->_dest->rx() - $vec['orig']->rx();
		$this->_y = $this->_dest->ry() - $vec['orig']->ry();
		$this->_z = $this->_dest->rz() - $vec['orig']->rz();
        
        if($vec["dest"]->rw())
			$this->_w = $this->_dest->rw() - $vec['orig']->rw();
        
            if(Self::$verbose)
			echo $this->__toString()." constructed".PHP_EOL;
	}

    public static function doc() {
        echo file_get_contents("Vector.doc.txt").PHP_EOL;
    }

    function __destruct(){
        
        if(Self::$verbose){
            echo ($this->__toString()." destructed".PHP_EOL);
        }
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

    public function rcolor(){
        return ($this->_color);
    }

    public function magnitude(){
       $mag = sqrt(pow($this->rx(), 2)+pow($this->ry(), 2)+pow($this->rz(), 2));
       return $mag;
    }

    public function normalize()
    {
        $mag = $this->magnitude();
        if ($mag){
            $x = $this->_x / $mag;
            $y = $this->_y / $mag;
            $z = $this->_z / $mag;
            $ver = new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z));
        }
        else{
        $ver = new Vertex(array('x'=>0.0, 'y'=>0.0, 'z'=>0.0, 'w'=>0.0));
        return(new Vector(array("dest" => $ver)));
        }
    }

    public function add(Vector $rhs){
        $x = $this->_x + $rhs->rx();
        $y = $this->_y + $rhs->ry();
        $z = $this->_z + $rhs->rz();
        $ver = new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z));
        return(new Vector(array("dest" => $ver)));
    }

    public function sub(Vector $rhs){
        $x = $this->_x - $rhs->rx();
        $y = $this->_y - $rhs->ry();
        $z = $this->_z - $rhs->rz();
        $ver = new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z));
        return(new Vector(array("dest" => $ver))); 
    }

    public function opposite(){
        $x = -$this->_x;
        $y = -$this->_y;
        $z = -$this->_z;
        $ver = new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z));
        return(new Vector(array("dest" => $ver)));
    }

    public function scalarProduct($k)
    {
    $x = $this->_x * $k;
    $y = $this->_y * $k;
    $z = $this->_z * $k;
    $ver = new Vertex(array('x'=>$x, 'y'=>$y, 'z'=>$z));
    return(new Vector(array("dest" => $ver)));
    }


        public function dotProduct(Vector $rhs)
    {
    $res = $this->_x * $rhs->rx() + $this->_y * $rhs->ry() + $this->_z * $rhs->rz();
    return ($res);
    }

    public function cos(Vector $rhs)
    {
    return($this->dotProduct($rhs)/($this->magnitude()*$rhs->magnitude()));
    }

    public function cross_product(Vector $rhs)
    {
    $x = $this->_y*$rhs->rz() - $rhs->ry()*$this->_z;
    $y = $this->_x*$rhs->rz() - $rhs->rx()*$this->_z;
    $z = $this->_x*$rhs->ry() - $rhs->rx()*$this->_y;
    $ver = new Vertex(array("x"=>$x, "y"=>-$y,"z"=>$z));
    return(new Vector(array("dest" => $ver)));
    }   
}

?>
