<?php
class EmployeeConnect extends Connect 
{
	public function auth ($login, $password) {
		$login = $this->db->quote($login);
		$res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, dolzhnost.name, employee.pass FROM employee "."INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". "WHERE employee.login = $login");
		$employee = $res->fetch(PDO::FETCH_OBJ);
		if ($employee) {
			if (password_verify($password, $employee->pass))
			{
				return $employee;
			}
		}
		return null;
	}
}
?>