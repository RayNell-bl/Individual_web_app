<?php
class OtdelConnect extends Connect 
{
public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM otdel");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT otdel_id FROM otdel WHERE otdel_id = $id");
            $otdel = $res->fetchObject("Otdel");
            if ($otdel) {
                return $otdel;
            }
        }
        return new Otdel();
    }

	public function arrOtdels(){
        $res = $this->db->query("SELECT otdel_id AS id, name AS value FROM otdel");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll ($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT otdel.otdel_id, otdel.name AS name, pred.name AS pr, otdel.parent_id AS par FROM otdel INNER JOIN pred ON otdel.pred_id=pred.pred_id");
    	return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT otdel.otdel_id, otdel.name AS name, pred.name AS pr FROM otdel INNER JOIN pred ON otdel.pred_id = pred.pred_id WHERE otdel.otdel_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false; 
    }

    public function findEmps($id=null) {
    	if ($id) {
    		$res =$this->db->query("SELECT otdel.otdel_id, employee.employee_id, dolzhnost.dolzhnost_id, CONCAT(employee.lastname,' ', employee.firstname, ' ', employee.patronomic) AS fio, dolzhnost.name AS dolzh FROM otdel"." INNER JOIN employee ON otdel.otdel_id = employee.otdel_id "."INNER JOIN dolzhnost ON employee.dolzhnost_id = dolzhnost.dolzhnost_id WHERE otdel.otdel_id = $id");
    		return $res->fetchAll(PDO::FETCH_OBJ);
    	}
    	return false;
}
	public function save(Otdel $otdel){
            if ($otdel->otdel_id == 0) {
                return $this->insert($otdel);
            } 
    }

    private function insert(Otdel $otdel){
        $name = $this->db->quote($otdel->name);
        $pred_id = $this->db->quote($otdel->pred_id);

        if ($this->db->exec("INSERT INTO otdel(name, pred_id)". " VALUES($name, $otdel->pred_id)") == 1) {
            $otdel->otdel_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
}
?>