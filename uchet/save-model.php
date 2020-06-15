<?php
require_once 'secure.php';
    if (isset($_POST['model_id'])) {
        $model = new Models();
        $model->name= Helper::clearString($_POST['ame']);
		if ((new ModelsConnect())->save($model)) {
			header('Location: list-models.php');
		}
    }
?>