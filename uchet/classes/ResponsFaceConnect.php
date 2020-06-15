<?php
class ResponsFaceConnect extends Connect 
{
	public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT respons_face_id FROM respons_face WHERE respons_face = $id");
            $responsface = $res->fetchObject("ResponsFace");
            if ($responsface) {
                return $responsface;
            }
        }
        return new ResponsFace();
    }

	public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM respons_face");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }
    public function findAllMatRespons($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT employee.employee_id, CONCAT (employee.lastname, ' ', employee.firstname, ' ', employee.patronomic) AS fio, ". " otdel.name AS otdel, dolzhnost.name AS dolzhnost, dolzhnost.mat_respons, employee.dolzhnost_id AS dolzhnost_id, respons_face.date_extrat as dat, dolzhnost.mat_respons as matr, technique.name AS tech, technique.inv_number AS num FROM employee INNER JOIN dolzhnost ON employee.dolzhnost_id=dolzhnost.dolzhnost_id ". " INNER JOIN otdel ON employee.otdel_id=otdel.otdel_id" . " INNER JOIN respons_face ON employee.employee_id = respons_face.employee_id". " INNER JOIN technique ON respons_face.technique_id = technique.technique_id"." WHERE dolzhnost.mat_respons = 1" . " LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function save(ResponsFace $respons_face){
            if ($respons_face->respons_face_id == 0) {
                return $this->insert($respons_face);
            } 
            else {
                return $this->update($respons_face);
            }
    }

    private function insert(ResponsFace $respons_face){
        $employee_id = $this->db->quote($respons_face->employee_id);
        $technique_id = $this->db->quote($respons_face->technique_id);
        $room_id = $this->db->quote($respons_face->room_id);
        $date_extrat = $this->db->quote($respons_face->date_extrat);

        if ($this->db->exec("INSERT INTO respons_face(employee_id, technique_id, room_id, date_extrat)". " VALUES($respons_face->employee_id, $respons_face->technique_id, $respons_face->room_id, $date_extrat)") == 1) {
            $respons_face->respons_face_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(ResponsFace $respons_face){
        $employee_id = $this->db->quote($respons_face->employee_id);
        $technique_id = $this->db->quote($respons_face->technique_id);
        $room_id = $this->db->quote($respons_face->room_id);
        $date_extrat = $this->db->quote($respons_face->date_extrat);

        if ( $this->db->exec("UPDATE respons_face SET employee_id = $respons_face->employee_id, technique_id = $respons_face->technique_id, ". " room_id = $respons_face->room_id, date_extrat = $date_extrat " . "WHERE respons_face_id = ".$respons_face->respons_face_id) == 1) {
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

    public function responsed($id=null) {
    	if ($id) {
    		$res =$this->db->query("SELECT technique.technique_id, technique.name AS tech, technique.inv_number AS num, room.name AS ro " ."FROM technique"." INNER JOIN room ON technique.room_id = room.room_id "."INNER JOIN respons_face ON technique.technique_id = respons_face.technique_id WHERE respons_face.employee_id = $id");
    		return $res->fetchAll(PDO::FETCH_OBJ);
    	}
    	return false;
}
}
?>