<?php
class Dolzhnost extends Table 
{
	public $dolzhnost_id = 0;
	public $name = '';
	public $mat_respons = 0;
	public function validate ()
	{
		if (!empty($this->name) && !empty($this->mat_respons)) {
			return true;
		}
		return false;
	}
}
?>