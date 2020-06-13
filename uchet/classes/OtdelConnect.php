<?php
class OtdelConnect extends Connect 
{
	public function arrOtdels(){
        $res = $this->db->query("SELECT otdel_id AS id, name AS value FROM otdel");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>