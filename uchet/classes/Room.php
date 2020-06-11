<?php
class Room extends Table 
{
	public $room_id = 0;
	public $name = '';
	public $ploshad = 0;
	public $otdel_id = 0;
	public function validate ()
	{
		if (!empty($this->name) && !empty($this->ploshad) && !empty($this->otdel_id)) {
			return true;
		}
		return false;
	}
}
?>