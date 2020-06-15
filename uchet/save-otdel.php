<?php
require_once 'secure.php';
    if (isset($_POST['otdel_id'])) {
        $otdel = new Otdel();
        $otdel->name= Helper::clearString($_POST['ame']);
        $otdel->pred_id= Helper::clearInt($_POST['pred_id']);
		if ((new OtdelConnect())->save($otdel)) {
			header('Location: list-otdel.php');
		}
    }
?>