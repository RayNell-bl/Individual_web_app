<?php
require_once 'secure.php';
    if (isset($_POST['technique_id'])) {
        $tech = new Technique();
        $tech->name= Helper::clearString($_POST['ame']);
        $tech->inv_number = Helper::clearString($_POST['inv_number']);
        $tech->model_id = Helper::clearInt($_POST['model_id']);
        $tech->room_id = Helper::clearInt($_POST['room_id']);
        $tech->date_buy = Helper::clearString($_POST['date_buy']);
        $tech->price = Helper::clearString($_POST['price']);
        
		if ((new TechniqueConnect())->save($tech)) {
			header('Location: list-tech.php');
		}
    }
?>