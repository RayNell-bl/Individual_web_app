<?php
require_once 'secure.php';
    if (isset($_POST['respons_face_id'])) {
        $respons_face = new ResponsFace();
        $respons_face->respons_face_id= Helper::clearInt($_POST['respons_face_id']);
        $respons_face->employee_id= Helper::clearInt($_POST['employee_id']);
        $respons_face->technique_id = Helper::clearInt($_POST['technique_id']);
        $respons_face->room_id = Helper::clearInt($_POST['room_id']);
        $respons_face->date_extrat = Helper::clearString($_POST['date_extrat']);
		if ((new ResponsFaceConnect())->save($respons_face)) {
			header('Location: list-mat-respons.php');
		}
    }
?>