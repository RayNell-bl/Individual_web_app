<?php
class EmployeeConnect extends Connect 
{
	public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT employee_id, dolzhnost_id FROM employee WHERE employee_id = $id");
            $employee = $res->fetchObject("Employee");
            if ($employee) {
                return $employee;
            }
        }
        return new Employee();
    }

    public function arrEmployees(){
        $res = $this->db->query("SELECT employee.employee_id AS id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS value FROM employee"." INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id WHERE dolzhnost.mat_respons=1");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

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

	public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, ". " otdel.name AS otdel, dolzhnost.name AS dolzhnost, dolzhnost.mat_respons AS matr, employee.dolzhnost_id as dolzhnost_id FROM employee INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". " INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id" . " LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAllDirectors($ofset=0, $limit=30){
        $res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, ". " otdel.name AS otdel, dolzhnost.name AS dolzhnost, dolzhnost.mat_respons AS matr, employee.dolzhnost_id AS dolzhnost_id FROM employee INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". " INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id" . " WHERE employee.dolzhnost_id = 2" . " LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAllManagers($ofset=0, $limit=30){
        $res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, ". " otdel.name AS otdel, dolzhnost.name AS dolzhnost, dolzhnost.mat_respons AS matr, employee.dolzhnost_id AS dolzhnost_id FROM employee INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". " INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id" . " WHERE employee.dolzhnost_id = 3" . " LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAllMatRespons($ofset=0, $limit=30){
        $res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, ". " otdel.name AS otdel, dolzhnost.name AS dolzhnost, dolzhnost.mat_respons AS matr, employee.dolzhnost_id AS dolzhnost_id FROM employee INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". " INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id" . " WHERE dolzhnost.mat_respons = 1" . " LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

	public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM employee");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function save(Employee $employee){
        if (!$this->existsLogin($employee->login)) {
            if ($employee->employee_id == 0) {
                return $this->insert($employee);
            } 
            else {
                return $this->update($employee);
            }
        }
        return false;
    }

    private function insert(Employee $employee){
        $lastname = $this->db->quote($employee->lastname);
        $firstname = $this->db->quote($employee->firstname);
        $patronomic = $this->db->quote($employee->patronomic);
        $login = $this->db->quote($employee->login);
        $pass = $this->db->quote($employee->pass);
        $otdel_id = $this->db->quote($employee->otdel_id);
        $dolzhnost_id = $this->db->quote($employee->dolzhnost_id);

        if ($this->db->exec("INSERT INTO employee(lastname, firstname, patronomic, login, pass, otdel_id, dolzhnost_id)". " VALUES($lastname, $firstname, $patronomic, $login, $pass, $employee->otdel_id, $employee->dolzhnost_id)") == 1) {
            $employee->employee_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(Employee $employee){
        $lastname = $this->db->quote($employee->lastname);
        $firstname = $this->db->quote($employee->firstname);
        $patronomic = $this->db->quote($employee->patronomic);
        $login = $this->db->quote($employee->login);
        $pass = $this->db->quote($employee->pass);
        $otdel_id = $this->db->quote($employee->otdel_id);
        $dolzhnost_id = $this->db->quote($employee->dolzhnost_id);

        if ( $this->db->exec("UPDATE employee SET lastname = $lastname, firstname = $firstname, patronomic = $patronomic,". " login = $login, pass = $pass, otdel_id = $employee->otdel_id, dolzhnost_id = $employee->dolzhnost_id ". "WHERE employee_id = ".$employee->employee_id) == 1) {
        return true;
        }
    return false;
    }

    private function existsLogin($login){
        $login = $this->db->quote($login);
        $res = $this->db->query("SELECT employee_id FROM employee WHERE login = $login");
        if ($res->fetchColumn() > 0) {
            return true;
        }
    return false;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT employee.employee_id, CONCAT(employee.lastname,' ', employee.firstname, ' ', employee.patronomic) AS fio,". " employee.login, dolzhnost.name AS dolzh, otdel.name AS otd FROM employee ". "INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id WHERE employee.employee_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false; 
    }
}
?>