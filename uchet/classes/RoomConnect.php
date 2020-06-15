<?php
class RoomConnect extends Connect 
{
	public function arrRooms(){
        $res = $this->db->query("SELECT room.room_id AS id, room.name AS value FROM room");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM room");
        return $res->fetch(PDO::FETCH_OBJ)->cnt; 
    }

    public function findAll ($ofset=0, $limit=30) {
    	$res = $this->db->query("SELECT room.room_id, room.name AS name, otdel.name AS ot, room.ploshad AS pl FROM room INNER JOIN otdel ON room.otdel_id=otdel.otdel_id");
    	return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT room_id FROM room WHERE room_id = $id");
            $room = $res->fetchObject("Room");
            if ($room) {
                return $room;
            }
        }
        return new Room();
    }

    public function save(Room $room){
            if ($room->room_id == 0) {
                return $this->insert($room);
            } 
    }

    private function insert(Room $room){
        $name = $this->db->quote($room->name);
        $ploshad = $this->db->quote($room->ploshad);
        $otdel_id = $this->db->quote($room->otdel_id);

        if ($this->db->exec("INSERT INTO room(name, ploshad, otdel_id)". " VALUES($name, $ploshad, $otdel_id)") == 1) {
            $room->room_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT room.room_id, room.name AS name, room.ploshad AS pl, otdel.name AS ot FROM room INNER JOIN otdel ON room.otdel_id = otdel.otdel_id WHERE room.room_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false; 
    }

    public function findTech($id=null) {
        if ($id) {
            $res =$this->db->query("SELECT room.room_id, technique.technique_id, technique.name AS tname, technique.inv_number AS num, CONCAT(employee.lastname,' ', employee.firstname, ' ', employee.patronomic) AS resp FROM room"." INNER JOIN technique ON room.room_id = technique.room_id "."INNER JOIN respons_face ON technique.technique_id = respons_face.technique_id". " INNER JOIN employee ON respons_face.employee_id = employee.employee_id WHERE room.room_id = $id");
            return $res->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
}
}
?>