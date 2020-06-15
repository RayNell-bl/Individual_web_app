<?php
class PredConnect extends Connect 
{
    public function arrPred(){
        $res = $this->db->query("SELECT pred_id AS id, name AS value FROM pred");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

	public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM pred");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function findAll ($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT pred_id AS id, name FROM pred");
    	return $res->fetchAll(PDO::FETCH_OBJ);
	}

	public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT pred_id FROM pred WHERE pred_id = $id");
            $pred = $res->fetchObject("Pred");
            if ($pred) {
                return $pred;
            }
        }
        return new Pred();
    }

    public function save(Pred $pred){
            if ($pred->pred_id == 0) {
                return $this->insert($pred);
            } 
    }

    private function insert(Pred $pred){
        $name = $this->db->quote($pred->name);

        if ($this->db->exec("INSERT INTO pred(name)". " VALUES($name)") == 1) {
            $pred->pred_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
}
?>