<?php
class ModelsConnect extends Connect 
{
	public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM models");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function arrModels(){
        $res = $this->db->query("SELECT models.model_id AS id, models.name AS value FROM models");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findAllModels ($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT models.model_id AS id, models.name AS name FROM models");
    	return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT model_id FROM models WHERE model_id = $id");
            $models = $res->fetchObject("Models");
            if ($models) {
                return $models;
            }
        }
        return new Models();
    }

    public function save(Models $model){
            if ($model->model_id == 0) {
                return $this->insert($model);
            } 
    }

    private function insert(Models $model){
        $name = $this->db->quote($model->name);

        if ($this->db->exec("INSERT INTO models(name)". " VALUES($name)") == 1) {
            $model->model_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
}
?>