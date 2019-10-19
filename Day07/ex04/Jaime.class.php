<?php 
class Jaime extends Lannister{
public function sleepWith($person){
if (get_class($person) == 'Sansa')
{
    print("Let's do it." . PHP_EOL);
}
if (get_class($person) == 'Cersei'){
    print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);

}
if (get_class($person) == 'Tyrion'){
    print("Not even if I am drunk !" . PHP_EOL);
}

}
}
?>