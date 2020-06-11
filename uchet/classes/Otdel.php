<?php
class Otdel extends Table 
{
	public $otdel_id = 0;
	public $name = '';
	public $pred_id = 0;
	public $parent_id = 0;
	public function validate ()
	{
		if (!empty($this->name) && !empty($this->pred_id)) {
			return true;
		}
		return false;
	}
}
?>