<?php
class TechniqueConnect extends Connect 
{
	 public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT technique_id FROM technique WHERE technique_id = $id");
            $tech = $res->fetchObject("Technique");
            if ($tech) {
                return $tech;
            }
        }
        return new Technique();
    }

	public function arrTechnique(){
        $res = $this->db->query("SELECT technique.technique_id AS id, technique.name AS value FROM technique");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM technique");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function findAll ($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT technique.technique_id, technique.name AS name, technique.inv_number AS num, models.name AS mo, room.name AS ro, otdel.name AS otd FROM technique" ." INNER JOIN models ON technique.model_id=models.model_id "."INNER JOIN room ON technique.room_id = room.room_id "."INNER JOIN otdel ON room.otdel_id = otdel.otdel_id");
    	return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function save(Technique $tech){
        if (!$this->existsNumber($tech->inv_number)) {
            if ($tech->tech_id == 0) {
                return $this->insert($tech);
            } 
            else {
                return $this->update($tech);
            }
        }
        return false;
    }

    private function insert(Technique $tech){
        $name = $this->db->quote($tech->name);
        $inv_number = $this->db->quote($tech->inv_number);
        $date_buy = $this->db->quote($tech->date_buy);
        $model_id = $this->db->quote($tech->model_id);
        $price = $this->db->quote($tech->price);
        $room_id = $this->db->quote($tech->room_id);
        if ($this->db->exec("INSERT INTO technique(inv_number, name, date_buy, model_id, price, room_id)". " VALUES($inv_number, $name, $date_buy, $model_id, $price, $room_id)") == 1) {
            $tech->technique_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(Technique $tech){
        $name = $this->db->quote($tech->name);
        $inv_number = $this->db->quote($tech->inv_number);
        $date_buy = $this->db->quote($tech->date_buy);
        $model_id = $this->db->quote($tech->model_id);
        $price = $this->db->quote($tech->price);
        $room_id = $this->db->quote($tech->room_id);

        if ( $this->db->exec("UPDATE technique SET inv_number = $inv_number, name = $name, date_buy = $date_buy,". " model_id = $technique->model_id, price = $price, room_id = $technique->room_id ". "WHERE technique_id = ".$tech->technique_id) == 1) {
        return true;
        }
    return false;
    }

    private function existsNumber($inv_number){
        $inv_number = $this->db->quote($inv_number);
        $res = $this->db->query("SELECT technique_id FROM technique WHERE inv_number = $inv_number");
        if ($res->fetchColumn() > 0) {
            return true;
        }
    return false;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT technique.technique_id, respons_face.employee_id AS eid, technique.name AS name, technique.inv_number AS num, models.name AS mo, room.name AS ro, CONCAT(employee.lastname,' ', employee.firstname, ' ', employee.patronomic) AS fio, technique.date_buy AS da, respons_face.date_extrat AS daex FROM technique ". "INNER JOIN models ON technique.model_id=models.model_id INNER JOIN room ON technique.room_id=room.room_id INNER JOIN respons_face ON technique.technique_id = respons_face.technique_id INNER JOIN employee ON respons_face.employee_id = employee.employee_id WHERE technique.technique_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false; 
    }
}
?>