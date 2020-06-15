<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
} else {
    header('Location: 404.php');
}
$header = 'Профиль Материально-ответственного';
$responsface = (new EmployeeConnect())->findProfileById($id);
$resps = (new ResponsFaceConnect())->responsed($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1>Профиль Материально-ответственного</h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

                    <li><a href="list-directors.php">Список материально-ответственных</a></li>

                    <li class="active">Профиль</li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-matrespons.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Ф.И.О.</th>
                        <td><?=$responsface->fio;?></td>
                    </tr>
                    <tr>
                        <th>Отдел</th>
                        <td><?=$responsface->otd;?></td>
                    </tr>
                    <tr>
                        <th>Должность</th>
                        <td><?=$responsface->dolzh;?></td>
                    </tr>
                    <tr>
                        <th>Логин</th>
                        <td><?=$responsface->login;?></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1>Список техники</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Техника</th>
                            <th>Номер</th>
                            <th>Комната</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($resps as $resp) {
                        echo '<tr>';
                        echo '<td><a href="profile-tech.php?id='.$resp->technique_id.'">'.$resp->tech.'</a> '. '</a></td>';
                        echo '<td>'.$resp->num.'</td>';
                        echo '<td>'.$resp->ro.'</td>';
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