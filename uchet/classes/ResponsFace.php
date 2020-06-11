<?php
class ResponsFace extends Table 
{
	public $respons_face_id = 0;
	public $employee_id = 0;
	public $technique_id = 0;
	public $room_id = 0;
	public $date_extrat = '';
	public function validate ()
	{
		if (!empty($this->employee_id) && !empty($this->technique_id) &&
		!empty($this->room_id) && !empty($this->date_extrat)) {
			return true;
		}
		return false;
	}
}
?>