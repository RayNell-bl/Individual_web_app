<?php
class Technique extends Table 
{
	public $technique_id = 0;
	public $inv_number = '';
	public $name = '';
	public $date_buy = '';
	public $model_id = 0;
	public $price = 0;
	public $room_id = 0;
	public function validate ()
	{
		if (!empty($this->name) && !empty($this->inv_number) &&
		!empty($this->date_buy) && !empty($this->model_id) &&
		!empty($this->price) && !empty($this->room_id)) {
			return true;
		}
		return false;
	}
}
?>