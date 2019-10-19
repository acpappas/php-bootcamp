<?php
class Nightswatch
{
	private $members = array();
	public function recruit($person)
	{
		$this->members[] = $person;
	}
	public function fight()
	{
		foreach($this->members as $fighter)
			if($fighter instanceof IFighter)
				$fighter->fight();
	}
}
?>