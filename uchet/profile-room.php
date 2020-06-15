<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль отдела';
$room = (new RoomConnect())->findProfileById($id);
$techies = (new RoomConnect())->findTech ($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1>Профиль отдела</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                    <li><a href="list-room.php">Список отделов</a></li>

                    <li class="active">Профиль</li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-room.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Название</th>
                        <td><?=$room->name;?></td>
                    </tr>
                    <tr>
                        <th>Площадь</th>
                        <td><?=$room->pl;?></td>
                    </tr>
                    <tr>
                        <th>Отдел</th>
                        <td><?=$room->ot;?></td>
                    </tr>
                </table>
            </div>

            <div>
                <h1>Список техники</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Инвентарный номер</th>
                            <th>Материально-ответственный</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($techies as $tech) {
                        echo '<tr>';
                        echo '<td><a href="profile-technique.php?id='.$tech->technique_id.'">'.$tech->tname.'</a> '. '</a></td>';
                        echo '<td>'.$tech->num.'</td>';
                        echo '<td>'.$tech->resp.'</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>