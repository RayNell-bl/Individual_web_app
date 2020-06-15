<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $room = (new RoomConnect())->findById($id);
    $header = (($id)?'Редактировать данные':'Добавить').' кабинет';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="list-managers.php">Список кабинетов</a></li>
    <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-room.php" method="POST">
    <div class="form-group">
        <label>Имя</label>
        <input type="text" class="form-control" name="ame" required="required" value="<?=$otdel->name;?>">
    </div>
    <div class="form-group">
        <label>Площадь</label>
        <input type="number" class="form-control" name="ploshad" required="required" value="<?=$otdel->name;?>">
    </div>
    <div class="form-group">
        <label>Отдел</label>
            <select class="form-control" name="otdel_id">
                <?= Helper::printSelectOptions($otdel->pred_id, (new OtdelConnect())->arrOtdels());?>
            </select>
    </div>
    <input type="hidden" name="room_id" value="<?=$id;?>"/>
    <div class="form-group">
        <button type="submit" name="saveRoom" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>