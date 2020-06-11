<?php
class Models extends Table 
{
	public $model_id = 0;
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