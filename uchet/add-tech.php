<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $tech = (new TechniqueConnect())->findById($id);
    $header = (($id)?'Редактировать данные':'Добавить').' техники';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="list-managers.php">Список техники</a></li>
    <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-tech.php" method="POST">
    <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control" name="ame" required="required" value="<?=$tech->name;?>">
    </div>
    <div class="form-group">
        <label>Инвентарный номер</label>
        <input type="text" class="form-control" name="inv_number" required="required" value="<?=$tech->inv_number;?>">
    </div>
    <div class="form-group">
        <label>Модель</label>
            <select class="form-control" name="model_id">
                <?= Helper::printSelectOptions($tech->model_id, (new ModelsConnect())->arrModels());?>
            </select>
    </div>
    <div class="form-group">
        <label>Кабинет</label>
            <select class="form-control" name="room_id">
                <?= Helper::printSelectOptions($tech->room_id, (new RoomConnect())->arrRooms());?>
            </select>
    </div>
    <div class="form-group">
        <label>Дата покупки</label>
        <input type="date" class="form-control" name="date_buy" required="required" value="<?=$tech->name;?>">
    </div>
    <div class="form-group">
        <label>Цена</label>
        <input type="number" class="form-control" name="price" required="required" value="<?=$tech->name;?>">
    </div>
    <input type="hidden" name="technique_id" value="<?=$id;?>"/>
    <div class="form-group">
        <button type="submit" name="saveTech" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>