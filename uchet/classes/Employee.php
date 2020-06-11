<?php
class Employee extends Table 
{
	public $employee_id = 0;
	public $firstname = '';
	public $lastname = '';
	public $patronomic = '';
	public $login = '';
	public $pass = '';
	public $dolzhnost_id = 0;
	public $otdel_id = 0;
	public function validate ()
	{
		if (!empty($this->firstname) && !empty($this->lastname) && 
			!empty($this->patronomic) && !empty($this->login) &&
			!empty($this->pass) && !empty($this->dolzhnost_id) &&
			!empty($this->otdel_id)) {
			return true;
		}
		return false;
	}
}
?>