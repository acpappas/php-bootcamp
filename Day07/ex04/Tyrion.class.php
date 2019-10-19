<?php 
class Tyrion extends Lannister{
public function sleepWith($person){
if (get_class($person) == 'Sansa')
{
    print("Let's do it." . PHP_EOL);
}
if (get_class($person) == 'Cersei'){
    print("Not even if I am drunk !" . PHP_EOL);

}
if (get_class($person) == 'Jaime'){
    print("Not even if I am drunk !" . PHP_EOL);
}

}
}
?>