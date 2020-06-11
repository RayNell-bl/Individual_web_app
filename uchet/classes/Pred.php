<?php
class Pred extends Table 
{
	public $pred_id = 0;
	public $name = '';
	public function validate ()
	{
		if (!empty($this->name)) {
			return true;
		}
		return false;
	}
}
?>