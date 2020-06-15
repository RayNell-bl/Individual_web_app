<?php
require_once 'secure.php';
    if (isset($_POST['pred_id'])) {
        $pred = new Pred();
        $pred->name= Helper::clearString($_POST['ame']);
		if ((new PredConnect())->save($pred)) {
			header('Location: list-preds.php');
		}
    }
?>