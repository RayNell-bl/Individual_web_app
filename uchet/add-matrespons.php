<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $responsfaceconnect = new ResponsFaceConnect();
    $responsface = ($responsfaceconnect->findById($id));
    $header = (($id)?'Редактировать данные':'Добавить').' материально-ответственного';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="list-managers.php">Список материально-ответственных</a></li>
    <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
<form action="save-mat-response.php" method="POST">
    <div class="form-group">
        <label>Менеджер</label>
        <select class="form-control" name="employee_id">
            <?= Helper::printSelectOptions($responsface->employee_id, (new EmployeeConnect())->arrEmployees());?>
        </select>
    </div>
    <div class="form-group">
        <label>Техника</label>
        <select class="form-control" name="technique_id">
            <?= Helper::printSelectOptions($responsface->technique_id, (new TechniqueConnect())->arrTechnique());?>
        </select>
    </div>
    <div class="form-group">
        <label>Кабинет</label>
            <select class="form-control" name="room_id">
                <?= Helper::printSelectOptions($responsface->room_id, (new RoomConnect())->arrRooms());?>
            </select>
    </div>
    <div class="form-group">
        <label>Дата передачи</label>
        <input type="date" class="form-control" name="date_extrat" required="required" value="<?=$responsface->date_extrat;?>">
    </div>
    <input type="hidden" name="respons_face_id" value="<?=$id;?>"/>
    <div class="form-group">
        <button type="submit" name="saveMatRespons" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>