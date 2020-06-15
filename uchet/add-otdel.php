<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $otdel = (new OtdelConnect())->findById($id);
    $header = (($id)?'Редактировать данные':'Добавить').' отдел';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="list-managers.php">Список отделов</a></li>
    <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-otdel.php" method="POST">
    <div class="form-group">
        <label>Имя</label>
        <input type="text" class="form-control" name="ame" required="required" value="<?=$otdel->name;?>">
    </div>
    <div class="form-group">
        <label>Предприятие</label>
            <select class="form-control" name="pred_id">
                <?= Helper::printSelectOptions($otdel->pred_id, (new PredConnect())->arrPred());?>
            </select>
    </div>
    <input type="hidden" name="otdel_id" value="<?=$id;?>"/>
    <div class="form-group">
        <button type="submit" name="saveModel" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>